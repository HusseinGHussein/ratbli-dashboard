<?php

namespace App\Http\Controllers\Providers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

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
            $orders = auth()->user()->orders()->with(['product', 'orderStatus', 'order.user'])->latest('order_items.created_at')->get();

            return Datatables::of($orders)
                ->editColumn('status', function ($row) {
                    return "<span class='label label-lg font-weight-bold  label-light-{$row->orderStatus->class} label-inline'>{$row->orderStatus->name}</span>";
                })
                ->editColumn('user', function ($row) {
                    return ($row->order->user->user_name) ? $row->order->user->user_name : '(بدون اسم)';
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
                    return view('vendors.orders.actions', compact('row'));
                })
                ->make(true);
        }

        return view('vendors.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
