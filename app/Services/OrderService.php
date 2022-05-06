<?php

namespace App\Services;

use App\Models\Order;
use Yajra\DataTables\DataTables;

class OrderService
{
    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable()
    {
        $orders = Order::query()->with('user')->latest();

        if (request()->has('toggleTestOrders') && request()->get('toggleTestOrders') == 'on') {
            $orders = $orders->toggleTestOrders(true);
        } else {
            $orders = $orders->toggleTestOrders();
        }

        self::filterWithPaymenType($orders);

        self::filterWithCreatedAt($orders);

        self::searchWithUserName($orders);

        self::searchWithUserPhone($orders);

        self::filterByProvider($orders);

        return Datatables::of($orders)
            ->editColumn('paymentType', function ($row) {
                return formatPaymentType($row->payment_type);
            })
            ->editColumn('promoCode', function ($row) {
                return ($row->promo_code_id) ? "<a href='javascript:void(0)' class='showPromoCodeModal' data-id='{$row->promo_code_id}'>{$row->promo->name}</a>" : "(لا يوجد)";
            })
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d', strtotime($row->created_at));
            })
            ->editColumn('userName', function ($row) {
                $username = ($row->user->user_name) ? $row->user->user_name : '(بدون اسم)';
                return "<a href='javascript:void(0)' class='showUserInfoModal' data-id='{$row->user_id }}'>
                    {$username}
                </a>";
            })
            ->editColumn('phone', function ($row) {
                return $row->user->phone;
            })
            ->editColumn('actions', function ($row) {
                return view('orders.actions', compact('row'));
            })
            ->make(true);
    }

    public static function filterWithPaymenType($query)
    {
        if (request()->has('payment_type') && in_array(request()->get('payment_type'), range(0, 4)) && request()->get('payment_type') != '') {
            $query = $query->where('payment_type', request()->get('payment_type'));
        }
    }

    public static function filterWithCreatedAt($query)
    {
        if (request()->has('start_date') and request()->get('start_date') != '') {
            if (request()->has('end_date') and request()->get('end_date') != '') {
                $query->whereDate('created_at', '>=', request()->get('start_date'))
                    ->whereDate('created_at', '<=', request()->get('end_date'));
            } else {
                $query->whereDate('created_at', '=', request()->get('start_date'));
            }
        }
    }

    public static function searchWithUserName($query)
    {
        if (request()->has('user_id') && request()->get('user_id') != '') {
            $query->whereHas('user', function ($query) {
                $userName = request()->get('user_id');
                $query->where('user_name', 'LIKE', '%' . $userName . '%');
            });
        }
    }

    public static function searchWithUserPhone($query)
    {
        if (request()->has('client_phone') && request()->get('client_phone') != '') {
            $query->whereHas('user', function ($user) {
                $user->where('phone', 'like', '%' . request()->get('client_phone') . '%');
            });
        }
    }

    public static function filterByProvider($query)
    {
        if (request()->has('provider_id') && request()->get('provider_id') != '') {
            $query->whereHas('orderItems', function ($orderItem) {
                $orderItem->whereHas('product', function ($product) {
                     $product->whereHas('provider', function ($provider) {
                        $providerName = request()->get('provider_id');
                        $provider->where('user_name', 'LIKE', '%' . $providerName . '%');
                     });
                });
            });
        }
    }
}
