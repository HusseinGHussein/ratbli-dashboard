<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Helpers\LoggerHelper;

class ActivatePromo extends Controller
{
    protected $loggerHelper;

    public function __construct(LoggerHelper $loggerHelper)
    {
        $this->loggerHelper = $loggerHelper;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Promo  $id
     * @return void
     */
    public function __invoke($id)
    {
        $promo = Promo::findOrFail($id);

        $promo->status = !(bool) $promo->status;
        $promo->save();

        $msg = ($promo->status == 1) ? 'تفعيل' : 'تعطيل';

        $this->loggerHelper->store('promo', $promo->id, "تم {$msg} كود الخصم {$promo->name} رقم {$promo->id}");

        flash("تم {$msg} كود الخصم بنجاح!", 'success');

        return back();
    }
}
