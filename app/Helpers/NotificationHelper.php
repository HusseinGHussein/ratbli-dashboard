<?php

namespace App\Helpers;

use Exception;
use Kreait\Firebase\Messaging;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Messaging\CloudMessage;

class NotificationHelper
{
    public function __construct(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }

    /**
     * Send messages to specific devices
     *
     * @param string $deviceToken
     * @param array $notification
     * @param array $data
     * @return void
     */
    public function sendToSpecificDevice($deviceToken, $notification = array(), $data = array())
    {
        try {
            $message = CloudMessage::withTarget('token', $deviceToken)
                ->withNotification($notification);

            $this->messaging->send($message);
        } catch (Exception $exception) {
            Log::error("[Notification] ".$exception->getMessage());
        }
    }
}