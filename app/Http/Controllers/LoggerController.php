<?php

namespace App\Http\Controllers;

use App\Models\Logger;

class LoggerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($type, $itemId)
    {
        $logs = Logger::where([
            ['type', '=', $type],
            ['item_id', '=', $itemId]
        ])->latest()->get();

        return view('logs.logs-content', compact('logs'))->render();
    }
}
