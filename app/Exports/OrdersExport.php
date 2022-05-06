<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\OrderItem;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromQuery, WithHeadings, WithMapping
{
    public function headings(): array
    {
        return [
            'id',
            'product_id',
            'product_name',
            'provider_id',
            'provider_name',
            'provider_mobile',
            'order_id',
            'time',
            'date',
            'amount',
            'price',
            'charge_cost',
            'total',
            'vat',
            'status',
            'is_express',
            'is_charity',
            'delivery',
            'address',
            'notes',
            'created_at',
            'payment_type',
            'user_id',
            'user_name',
            'user_mobile',
            'order_id',
            'total',
            'promo_code_id',
            'name',
            'type',
            'value',
            'with_delivery',
            'min_discount',
            'max_discount',
            'total_after_discount',
        ];
    }

    public function query()
    {
        return OrderItem::query()
            ->with(['order.user', 'order.promo', 'product.provider'])
            ->whereHas('order', function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('is_test', '=', 0);
                });
            });
    }

    public function map($orderItem): array
    {
        return [
            $orderItem->id,
            $orderItem->product_id,
            $orderItem->product->name,
            $orderItem->product->provider->id,
            $orderItem->product->provider->user_name,
            $orderItem->product->provider->phone,
            $orderItem->order_id,
            $orderItem->time,
            $orderItem->date,
            $orderItem->amount,
            $orderItem->price,
            $orderItem->charge_cost,
            $orderItem->total,
            $orderItem->vat,
            $orderItem->status,
            $orderItem->is_express,
            $orderItem->is_charity,
            $orderItem->delivery,
            $orderItem->address,
            $orderItem->notes,
            Carbon::parse($orderItem->created_at),
            $orderItem->order->payment_type,
            $orderItem->order->user_id,
            $orderItem->order->user->user_name,
            $orderItem->order->user->phone,
            $orderItem->order->order_id,
            $orderItem->order->total,
            $orderItem->order->promo_code_id,
            $orderItem->order->promo->name ?? '',
            $orderItem->order->promo->type ?? '',
            $orderItem->order->promo->value ?? '',
            $orderItem->order->promo->with_delivery ?? '',
            $orderItem->order->promo->min_discount ?? '',
            $orderItem->order->promo->max_discount ?? '',
            $orderItem->order->total_after_discount,
        ];
    }
}
