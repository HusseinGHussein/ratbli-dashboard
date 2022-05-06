<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderTracking extends Controller
{
    /**
     * Get list of order trackings
     *
     * @param Request $request
     * @param OrderItem $orderItem
     * @return void
     */
    public function __invoke(Request $request, OrderItem $orderItem)
    {
        $trackings = $orderItem->orderTrackings;

        return view('orders.modals.trackings-content', compact('trackings'))->render();
    }
}
