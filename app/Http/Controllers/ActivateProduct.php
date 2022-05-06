<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\LoggerHelper;

class ActivateProduct extends Controller
{
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

        $product->is_hidden = !(bool) $product->is_hidden;
        $product->save();

        $msg = ($product->is_hidden == 0) ? 'تفعيل' : 'تعطيل';

        $this->loggerHelper->store('product', $product->id, "تم {$msg} المنتج {$product->name} رقم {$product->id}");

        flash("تم {$msg} المنتج بنجاح!", 'success');

        return back();
    }
}
