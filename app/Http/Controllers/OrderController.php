<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Services\OrderService;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->expectsJson()) {
            return OrderService::dataTable();
        }

        /*$users = User::where([
            ['is_test', '=', 0],
            ['is_vendor', '=', 0],
            ['is_admin', '=', 0]
        ])->get();*/

       // $providers = User::where('is_vendor', '=', 1)->get();

        return view('orders.index');
    }

    /**
     * Get list of order items
     *
     * @param Order $order
     * @return void
     */
    public function orderItems(Order $order)
    {
        $orderItems = $order->orderItems()->with(['product', 'orderStatus'])->get();

        return view('orders.modals.order-items-content', compact('orderItems'))->render();
    }
}
