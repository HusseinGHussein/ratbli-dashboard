<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

if (!function_exists('flash')) {
    /**
     * flash message
     * @param  string $message
     * @param  string $level
     * @return mixed
     */
    function flash($message, $level = 'info', $dismissible = true)
    {
        Session::flash('flash_message', $message);

        if (!in_array($level, ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'])) {
            $level = 'info';
        }

        Session::flash('flash_message_level', $level);

        Session::flash('flash_message_dismissible', $dismissible);
    }
}

/**
 * Format payment type
 *
 * @param var $type
 * @return void
 */
function formatPaymentType($type)
{
    $paymentTypes = [
        0 => [
            'title' => 'لم يتم اختيار وسيلة الدفع',
            'class' => 'label-light-dark'
        ],
        1 => [
            'title' => 'الدفع للمندوب',
            'class' => 'label-light-info'
        ],
        2 => [
            'title' => 'تحويل بنكي',
            'class' => 'label-light-warning'
        ],
        3 => [
            'title' => 'الدفع عند الاستلام',
            'class' => 'label-light-danger'
        ],
        4 => [
            'title' => 'فيزا',
            'class' => 'label-light-success'
        ]
    ];

    return "<span class='label {$paymentTypes[$type]['class']} label-pill label-inline'>{$paymentTypes[$type]['title']}</span>";
}


/**
 * Get string between two strings
 *
 * @param string $string
 * @param string $start
 * @param string $end
 * @return void
 */
function getStringBetween($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;

    return substr($string, $ini, $len);
}

// Converts a number into a short version, eg: 1000 -> 1k
function numberFormatShort($n, $precision = 1)
{
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        $suffix = 'K';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        $suffix = 'M';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        $suffix = 'T';
    }

    // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
    // Intentionally does not affect partials, eg "1.50" -> "1.50"
    if ($precision > 0) {
        $dotzero = '.' . str_repeat('0', $precision);
        $n_format = str_replace($dotzero, '', $n_format);
    }

    return $n_format . $suffix;
}

function getDatesFromRange($start, $end, $format = 'Y-m-d')
{

    $dates = array();

    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    foreach($period as $date) {
        array_push($dates, $date->format($format));
    }

    return $dates;
}

function getFolderPath($fullUrl, $baseUrl = 'https://ratbli-img.s3.me-south-1.amazonaws.com/')
{
    $url = explode($baseUrl, $fullUrl);

    return $url[1];
}

/**
 * Fix phone number format
 *
 * @param var $phone
 * @return void
 */
function fixPhoneFormat($phone)
{
    if (Str::startsWith($phone, '+')) {
        return preg_replace('/^\+/', '', $phone);
    }

    return $phone;
}

function sendClientSMS($orderItem)
{
    return app('App\Http\Controllers\OperationController')->sendClientSMS($orderItem);
}

function sendProviderSMS($orderItem)
{
    return app('App\Http\Controllers\OperationController')->sendProviderSMS($orderItem);
}

function sendDeliverySMS($orderItem, $lang = 'ar')
{
    return app('App\Http\Controllers\OperationController')->sendDeliverySMS($orderItem, $lang);
}