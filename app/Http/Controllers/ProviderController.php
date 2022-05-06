<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ProviderService;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->expectsJson()) {
            return ProviderService::dataTable();
        }

        return view('providers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(User $provider)
    {
        $orders = $provider->orders()
            ->with(['product', 'orderStatus', 'order.user'])
            ->whereHas('order', function ($query) {
                $query->whereHas('user', function ($query) {
                    return $query->where('is_test', 0);
                });
            })
            ->take(10)
            ->latest()
            ->get();

        $provider->loadCount(['products', 'orders', 'sections']);

        return view('providers.show', compact('provider', 'orders'));
    }
}
