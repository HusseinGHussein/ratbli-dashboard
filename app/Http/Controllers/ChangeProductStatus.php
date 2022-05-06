<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\LoggerHelper;

class ChangeProductStatus extends Controller
{
    const STATUS_WAITING_ACTIVATION = 0;
    const STATUS_ACTIVATETD = 1;
    const STATUS_DEACTIVATED = 2;

    protected $loggerHelper;

    public function __construct(LoggerHelper $loggerHelper)
    {
        $this->loggerHelper = $loggerHelper;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Product $id
     * @return void
     */
    public function __invoke($id)
    {
        $product = Product::findOrFail($id);

        $msg = $this->statuses()[$product->status]['text'];

        $product->status = $this->statuses()[$product->status]['action'];
        $product->save();

        $this->loggerHelper->store('product', $product->id, "تم {$msg} المنتج {$product->name} رقم {$product->id}");

        flash("تم {$msg} المنتج بنجاح!", 'success');

        return back();
    }

    private function statuses()
    {
        $statuses = [
            self::STATUS_WAITING_ACTIVATION => [
                'text' => 'تفعيل',
                'action' => self::STATUS_ACTIVATETD
            ],
            self::STATUS_ACTIVATETD => [
                'text' => 'إيقاف',
                'action' => self::STATUS_DEACTIVATED
            ],
            self::STATUS_DEACTIVATED => [
                'text' => 'تفعيل',
                'action' => self::STATUS_ACTIVATETD
            ]
        ];

        return $statuses;
    }
}
