<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\View;

class OrderItemController extends Controller
{
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $orderItems = OrderItem::query()
            ->with(['order.user', 'product.provider', 'orderStatus'])
            ->when($request->filled('status'), function ($query) use ($request) {
                if ($request->status == 1) {
                    return $query->whereIn('status', [1, 2]);
                }
                return $query->where('status', $request->status);
            })
            ->when($request->filled('provider'), function ($query) use ($request) {
                $query->whereHas('product', function ($query) use ($request) {
                    $query->whereHas('provider', function ($query) use ($request) {
                        return $query->where('id', $request->provider);
                    });
                });
            })
            ->whereHas('order', function ($order) {
                $order->whereHas('user', function ($user) {
                    return $user->where('is_test', 0);
                });
            })
            ->where('created_at', '>', '2018-04-23')
            ->latest();

            return DataTables::of($orderItems)
                ->editColumn('order_id', function ($row) {
                    return $row->order->order_id;
                })
                ->editColumn('status', function ($row) {
                    return "<span class='label label-lg font-weight-bold  label-light-{$row->orderStatus->class} label-inline'>{$row->orderStatus->name}</span>";
                })
                ->editColumn('user', function ($row) {
                    return ($row->order->user->user_name) ? $row->order->user->user_name : '(بدون اسم)';
                })
                ->editColumn('provider', function ($row) {
                    return ($row->product->provider->user_name) ? $row->product->provider->user_name : '(بدون اسم)';
                })
                ->editColumn('paymentType', function ($row) {
                    return formatPaymentType($row->order->payment_type);
                })
                ->editColumn('product', function ($row) {
                    return $row->product->name;
                })
                ->editColumn('time', function ($row) {
                    return (getStringBetween($row->notes, '<', '>')) ? getStringBetween($row->notes, '<', '>') : $row->time;
                })
                ->editColumn('actions', function ($row) {
                    return view('order-items.actions', compact('row'));
                })
                ->filterColumn('order_id', function ($query, $keyword) {
                    $query->whereHas('order', function ($query) use ($keyword) {
                        $query->where('order_id', 'LIKE', $keyword.'%');
                    });
                })
                ->make(true);
        }

        return View::make('order-items.index');
    }

    public function edit(OrderItem $orderItem)
    {
        return response()->json($orderItem);
    }
}
