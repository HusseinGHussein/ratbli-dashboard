<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Helpers\LoggerHelper;
use Illuminate\Validation\Rule;
use App\Helpers\NotificationHelper;
use Illuminate\Support\Facades\Validator;

class OrderStatusController extends Controller
{
    protected $notificationHelper;
    protected $loggerHelper;

    public function __construct(NotificationHelper $notificationHelper, LoggerHelper $loggerHelper)
    {
        $this->notificationHelper = $notificationHelper;
        $this->loggerHelper = $loggerHelper;
    }

    /**
     * Change order status
     *
     * @param OrderItem $orderItem
     * @return void
     */
    public function inWaiting(OrderItem $orderItem)
    {
        $orderItem->inWaiting();

        //send notification
        $deviceToken = $orderItem->order->user->firebase_token;
        $notification = [
            'title' => "الطلب قيد الانتظار",
            'body' => "طلبك قيد الانتظار : {$orderItem->product->name}",
            'image' => "http://www.iconarchive.com/download/i99487/webalys/kameleon.pics/Party-Poppers.ico",
        ];

        $this->notificationHelper->sendToSpecificDevice($deviceToken, $notification);

        //store logs
        $this->loggerHelper->store('order', $orderItem->id, "الطلب رقم {$orderItem->id} قيد الانتظار");

        return response()->json(['success' => true, 'orderId' => $orderItem->order_id]);
    }

    /**
     * Change order status
     *
     * @param Request $request
     * @param OrderItem $orderItem
     * @return void
     */
    public function accept(Request $request, OrderItem $orderItem)
    {
        $validator = Validator::make($request->all(), [
            'delivery' => ['required', Rule::in(['Ratbli', 'Jiibli'])]
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $orderItem->accept();

        //send notification
        $deviceToken = $orderItem->order->user->firebase_token;
        $notification = [
            'title' => "قبول الطلب",
            'body' => "عميلنا العزيز تم قبول الطلب : {$orderItem->product->name}",
            'image' => "http://www.iconarchive.com/download/i99487/webalys/kameleon.pics/Party-Poppers.ico",
        ];

        $this->notificationHelper->sendToSpecificDevice($deviceToken, $notification);

        //store logs
        $this->loggerHelper->store('order', $orderItem->id, "تم قبول الطلب رقم {$orderItem->id}");

        return response()->json(['success' => true, 'orderId' => $orderItem->order_id]);
    }

    /**
     * Change order status
     *
     * @param Request $request
     * @param OrderItem $orderItem
     * @return void
     */
    public function refuse(Request $request, OrderItem $orderItem)
    {
        $validator = Validator::make($request->all(), [
            'refuse_type' => ['required', Rule::in([1, 2, 3])],
            'refuse_reason' => 'required|string|min:3|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $orderItem->refuse();

        //send notification
        $deviceToken = $orderItem->order->user->firebase_token;
        $notification = [
            'title' => "رفض الطلب",
            'body' => "تم رفض طلبك : {$orderItem->product->name}",
            'image' => "http://www.iconarchive.com/download/i99487/webalys/kameleon.pics/Party-Poppers.ico",
        ];

        $this->notificationHelper->sendToSpecificDevice($deviceToken, $notification);

        //store logs
        $this->loggerHelper->store('order', $orderItem->id, "تم رفض الطلب رقم {$orderItem->id}");

        return response()->json(['success' => true, 'orderId' => $orderItem->order_id]);
    }

    /**
     * Change order status
     *
     * @param OrderItem $orderItem
     * @return void
     */
    public function prepare(OrderItem $orderItem)
    {
        $orderItem->prepare();

        //send notification
        $deviceToken = $orderItem->order->user->firebase_token;
        $notification = [
            'title' => "الطلب قيد التحضير",
            'body' => "طلبك قيد التحضير : {$orderItem->product->name}",
            'image' => "http://www.iconarchive.com/download/i99487/webalys/kameleon.pics/Party-Poppers.ico",
        ];

        $this->notificationHelper->sendToSpecificDevice($deviceToken, $notification);

        //store logs
        $this->loggerHelper->store('order', $orderItem->id, "جاري تحضير الطلب رقم {$orderItem->id}");

        return response()->json(['success' => true, 'orderId' => $orderItem->order_id]);
    }

    /**
     * Change order status
     *
     * @param OrderItem $orderItem
     * @return void
     */
    public function readyForDelivery(OrderItem $orderItem)
    {
        $orderItem->readyForDelivery();

        //send notification
        $deviceToken = $orderItem->order->user->firebase_token;
        $notification = [
            'title' => "الطلب خارج للتوصيل",
            'body' => "طلبك خارج للتوصيل : {$orderItem->product->name}",
            'image' => "http://www.iconarchive.com/download/i99487/webalys/kameleon.pics/Party-Poppers.ico",
        ];

        $this->notificationHelper->sendToSpecificDevice($deviceToken, $notification);

        //store logs
        $this->loggerHelper->store('order', $orderItem->id, "الطلب رقم {$orderItem->id} خارج للتوصيل");

        return response()->json(['success' => true, 'orderId' => $orderItem->order_id]);
    }

    /**
     * Change order status
     *
     * @param OrderItem $orderItem
     * @return void
     */
    public function complete(OrderItem $orderItem)
    {
        $orderItem->complete();

        //send notification
        $deviceToken = $orderItem->order->user->firebase_token;
        $notification = [
            'title' => "اكتمال الطلب",
            'body' => "تم اكتمال طلبك : {$orderItem->product->name}",
            'image' => "http://www.iconarchive.com/download/i99487/webalys/kameleon.pics/Party-Poppers.ico",
        ];

        $this->notificationHelper->sendToSpecificDevice($deviceToken, $notification);

        //store logs
        $this->loggerHelper->store('order', $orderItem->id, "تم اكتمال الطلب رقم {$orderItem->id}");

        return response()->json(['success' => true, 'orderId' => $orderItem->order_id]);
    }

}
