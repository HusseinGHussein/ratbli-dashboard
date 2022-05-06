<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderInvoice extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Order $order)
    {
        $categories = [];
        $items = [];
        $nonDiscountDelivery = 0;
        $discountDelivery = 0;
        $totalDelivery = 0;
        $discountItemsTotal = 0;
        $discountItemsTotalAfterDiscount = 0;
        $discount = 0;
        $invoice = [];
        $totalBefore = 0;
        $totalDiscount = 0;
        $totalAfterDiscount = 0;
        $totalVat = 0;
        $total = 0;

        $order->load(['user', 'promo']);
        $orderItems = $order->orderItems()->with(['product', 'product.provider', 'orderStatus'])->get();

        if ($order->promo) {
            $categories = unserialize($order->promo->category_id);
        }

        foreach ($orderItems as $orderItem) {
            $item['id'] = $orderItem->id;
            $item['product'] = $orderItem->product->name;
            $item['provider'] = $orderItem->product->provider->user_name;
            $item['date'] = $orderItem->date;
            $item['price'] = $orderItem->price;
            $item['amount'] = $orderItem->amount;
            $item['totalPrice'] = $totalPrice = $orderItem->price * $orderItem->amount;
            $item['vat'] = $orderItem->vat;
            $item['status'] = $orderItem->status;
            $item['orderStatus'] = $orderItem->orderStatus->name;
            $item['is_discount'] = in_array($orderItem->product->cat_id, $categories) ? 1 : 0;
            $item['discount'] = 0;

            array_push($items, $item);
        }

        $nonDiscountDelivery = OrderItem::select('charge_cost')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->whereHas('order', function ($query) use ($order) {
                $query->where('id', '=', $order->id);
            })->whereHas('product', function ($query) use ($categories) {
                $query->whereNotIn('cat_id', $categories);
            })->where('order_items.status', '!=', 4)->groupBy('products.user_id', 'order_items.date')->get()->sum('charge_cost');

        $discountDelivery = OrderItem::select('charge_cost')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->whereHas('order', function ($query) use ($order) {
                $query->where('id', '=', $order->id);
            })->whereHas('product', function ($query) use ($categories) {
                $query->whereIn('cat_id', $categories);
            })->where('order_items.status', '!=', 4)->groupBy('products.user_id', 'order_items.date')->get()->sum('charge_cost');

        $totalDelivery = $nonDiscountDelivery + $discountDelivery;

        $itemsCollection = collect($items);

        $discountItemsTotal = $itemsCollection->where('is_discount', 1)->sum('totalPrice');
        $discountItemsTotalAfterDiscount = $discountItemsTotal;

        if ($order->promo) {
            if ($order->promo->type == "percentage") {
                $discountItemsTotalAfterDiscount = $discountItemsTotal - (float) (($order->promo->value *  $discountItemsTotal) / 100);
                $discount = $discountItemsTotal - $discountItemsTotalAfterDiscount;
                if ($discount > $order->promo->max_discount) {
                    $discountItemsTotalAfterDiscount = $discountItemsTotal - $order->promo->max_discount;
                    $discount = $order->promo->max_discount;
                }
            } else {
                $discountItemsTotalAfterDiscount = $discountItemsTotal - (float) $order->promo->value;
                $discount = $discountItemsTotal - $discountItemsTotalAfterDiscount;
                if ($discount > $order->promo->max_discount) {
                    $discountItemsTotalAfterDiscount = $discountItemsTotal - $order->promo->max_discount;
                    $discount = $order->promo->max_discount;
                }
            }

            if($order->promo->with_delivery) {
                $totalDelivery = $nonDiscountDelivery;
            }
        }

        $invoice = array_map(function ($item) use ($discountItemsTotal, $discount) {
            return [
                'id' => $item['id'],
                'product' => $item['product'],
                'provider' => $item['provider'],
                'date' => $item['date'],
                'price' => $item['price'],
                'amount' => $item['amount'],
                'totalPrice' => $item['totalPrice'],
                'vat' => $item['vat'],
                'status' => $item['status'],
                'orderStatus' => $item['orderStatus'],
                'is_discount' => $item['is_discount'],
                'discount' => ($item['is_discount']) ? ($discount * ($item['totalPrice'] / $discountItemsTotal)) : 0,
            ];
        }, $items);

        $invoiceCollection = collect($invoice);
        $totalBefore = $invoiceCollection->where('status', '<>', 4)->sum('totalPrice');
        $totalDiscount = $invoiceCollection->where('status', '<>', 4)->sum('discount');
        $totalAfterDiscount = $totalBefore - $totalDiscount;
        $totalVat = $invoiceCollection->where('status', '<>', 4)->sum('vat');
        $total = $totalAfterDiscount + $totalVat;

        return view('orders.invoice', compact('order', 'invoice', 'totalBefore', 'totalDiscount', 'totalAfterDiscount', 'totalVat', 'total', 'totalDelivery'));
    }
}
