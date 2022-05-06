<?php

namespace App\Http\Controllers;

class OperationController extends Controller
{
    public function sendClientSMS($orderItem)
    {
        $msg = "
        *السلام عليكم ورحمه الله وبركاته*
%0a
%0a
عميلنا العزيز *{$orderItem->order->user->user_name}* رقم جوال {$orderItem->order->user->phone}
%0a
%0a
يوجد لديك طلب رقم *{$orderItem->order->order_id}* ليوم {$this->getDayName($orderItem->date)} بتاريخ {$orderItem->date}
%0a
%0a
*اسم المنتج*
%0a
{$orderItem->product->name}
%0a
%0a
*نوع مقدم الخدمة*
%0a
{$this->getProviderGender($orderItem->gender)}
%0a
%0a
*العنوان*
%0a
{$orderItem->address}
%0a
%0a
*الفترة*
%0a
{$orderItem->time}
%0a
%0a
*التاريخ*
%0a
{$orderItem->date}
%0a
%0a
*الكمية*
%0a
{$orderItem->amount}
%0a
%0a
*السعر*
%0a
{$orderItem->total}
%0a
%0a
*تفاصيل المنتج*
%0a
{$orderItem->product->desc}
%0a
%0a
*ملاحظات*
%0a
{$this->formatRemarks($orderItem->notes)}
%0a
%0a
*يرجى التأكيد على الطلب*
%0a
%0a
*يرجى تأكيد موقع التوصيل بعد تأكيد الطلب*
%0a
_خدمة عملاء تطبيق رتب.لي_
        ";

        return $msg;
    }

    public function sendProviderSMS($orderItem)
    {
        $msg = "
        *السلام عليكم ورحمه الله وبركاته*
%0a
%0a
شريكنا العزيز *{$orderItem->product->provider->user_name}* رقم جوال {$orderItem->product->provider->phone}
%0a
لديكم طلب جديد رقم *{$orderItem->order->order_id}* ليوم {$this->getDayName($orderItem->date)} {$orderItem->date}
%0a
%0a
*اسم المنتج*
%0a
{$orderItem->product->name}
%0a
%0a
*نوع مقدم الخدمة*
%0a
{$this->getProviderGender($orderItem->gender)}
%0a
%0a
*العنوان*
%0a
{$orderItem->address}
%0a
%0a
*الفترة*
%0a
{$orderItem->time}
%0a
%0a
*التاريخ*
%0a
{$orderItem->date}
%0a
%0a
*الكمية*
%0a
{$orderItem->amount}
%0a
%0a
*السعر*
%0a
{$orderItem->total}
%0a
%0a
*تفاصيل المنتج*
%0a
{$orderItem->product->desc}
%0a
%0a
*ملاحظات*
%0a
{$this->formatRemarks($orderItem->notes)}
%0a
%0a
*يرجي تأكيد الطلب*
%0a
*يرجي تأكيد المسئول عن توصيل هذا الطلب انتم ام التطبيق*
%0a
_خدمة عملاء تطبيق رتب.لي_
        ";

        return $msg;
    }

    public function sendDeliverySMS($orderItem, $lang = 'ar')
    {
        $delivery = ($orderItem->is_express == 1) ? $orderItem->product->provider->express_charge_cost : $orderItem->charge_cost;
        $ratbli_percentage = $orderItem->total * 0.05;
        $total = $orderItem->total + $delivery;

        $msg = "
        *السلام عليكم ورحمة الله وبركاته*
*شريك رتب.لي للتوصيل*
%0a
%0a
*لدينا توصيل طلب رقم {$orderItem->order->order_id}* 
%0a
*لتاريخ* {$orderItem->date}
%0a
%0a
*اسم المنتج*
%0a
{$orderItem->product->name}
%0a
%0a
*الفتره*
%0a
{$orderItem->time}
%0a
%0a
*التاريخ*
%0a
{$orderItem->date}
%0a
%0a
*الكمية*
%0a
{$orderItem->amount}
%0a
%0a
*التوصيل*
%0a
xxx
%0a
%0a
*مايسلم لمزود الخدمه*
%0a
xxx
%0a
%0a
*مايسلم الماليه*
%0a
xxx
%0a
%0a
*إجمالي مايوخذ من العميل*
%0a
xxx
%0a
%0a
*ملاحظات*
%0a
{$this->formatRemarks($orderItem->notes)}
%0a
%0a
*اسم مزود الخدمة*
%0a
{$orderItem->product->provider->user_name}
%0a
%0a
*رقم جوال مزود الخدمة*
%0a
{$orderItem->product->provider->phone}
%0a
%0a
*اسم العميل*
%0a
{$orderItem->order->user->user_name}
%0a
%0a
*رقم جوال العميل*
%0a
{$orderItem->order->user->phone}
%0a
%0a
*سيتم ارسال اللوكيشن تباعا*
%0a
%0a
_خدمة عملاء تطبيق رتب.لي_
        ";

        $msg_en = "
*Peace, mercy and blessings of God*
%0a
*Dear Ratb.li Delivery Partner*
%0a
%0a
*delivery order number {$orderItem->order->order_id}* 
%0a
*Delivery Date* {$orderItem->date}
%0a
%0a
*product name*
%0a
{$orderItem->product->name}
%0a
%0a
*Delivery Period*
%0a
{$orderItem->time}
%0a
%0a
*Delivery Date*
%0a
{$orderItem->date}
%0a
%0a
*Quantity*
%0a
{$orderItem->amount}
%0a
%0a
*Delivery Charges*
%0a
xxx
%0a
%0a
*Amount Paid To Provider/Vendor*
%0a
xxx
%0a
%0a
*Amount Paid to Finance Department*
%0a
xxx
%0a
%0a
*Total Amount Collected from the client*
%0a
xxx
%0a
%0a
*Notice*
%0a
{$this->formatRemarks($orderItem->notes)}
%0a
%0a
*Provider Name*
%0a
{$orderItem->product->provider->user_name}
%0a
%0a
*Provider Number*
%0a
{$orderItem->product->provider->phone}
%0a
%0a
*Client's Name*
%0a
{$orderItem->order->user->user_name}
%0a
%0a
*Client's Number*
%0a
{$orderItem->order->user->phone}
%0a
%0a
*Location will be sent later on*
%0a
%0a
_Ratb.li Customer Service Representative_
";

        if ($lang === 'ar') {
            return $msg;
        }

        return $msg_en;
    }

    public function getProviderGender($gender)
    {
        switch ($gender) {
            case ($gender == "male"):
                return "رجال";
                break;
            case ($gender == "female"):
                return "نساء";
                break;
            default:
                return "لا يحتاج مقدم خدمة";
        }
    }

    public function getDayName($date)
    {
        $name = date('l', strtotime($date));

        switch ($name) {
            case ($name === "Saturday"):
                return "السبت";
                break;
            case ($name === "Sunday"):
                return "الأحد";
                break;
            case ($name === "Monday"):
                return "الأثنين";
                break;
            case ($name === "Tuesday"):
                return "الثلاثاء";
                break;
            case ($name === "Wednesday"):
                return "الأربعاء";
                break;
            case ($name === "Thursday"):
                return "الخميس";
                break;
            case ($name === "Friday"):
                return "الجمعة";
                break;
            default;
        }

        return $name;
    }

    public function formatRemarks($remarks)
    {
        $remarks = str_replace(str_split('<>'), ' ', $remarks);

        return $remarks;
    }
}
