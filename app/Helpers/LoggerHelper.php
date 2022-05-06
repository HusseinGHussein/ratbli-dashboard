<?php

namespace App\Helpers;

use App\Models\Logger;
use Illuminate\Support\Facades\Auth;

class LoggerHelper
{
    /**
     * Store logs to DB
     *
     * @param string $type
     * @param int $itemId
     * @param string $description
     * @return void
     */
    public function store($type, $itemId, $description)
    {
        $logger = new Logger;
        $logger->type= $type;
        $logger->item_id= $itemId;
        $logger->description= $description;
        $logger->user_id = Auth::user()->id;

        $logger->save();
    }
}