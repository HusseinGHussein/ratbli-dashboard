<?php

namespace App\Services;

use App\Models\Product;
use Yajra\DataTables\DataTables;

class ProductService
{
    const STATUS_WAITING_ACTIVATION = 0;
    const STATUS_ACTIVATETD = 1;
    const STATUS_DEACTIVATED = 2;

    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable($provider = '')
    {
        $products = Product::query()
                        ->select('id', 'name', 'cat_id', 'views', 'img', 'price', 'max_num', 'min_quantity', 'status')
                        ->with('category')
                        ->when($provider != '', function ($query) use ($provider) {
                            return $query->where('user_id', $provider);
                        });

        if(request()->has('status') && in_array(request()->get('status'), [0, 1, 2]) && request()->get('status') != '') {
            $products = $products->where('status', '=', request()->get('status'));
        }

        return Datatables::of($products)
            ->editColumn('name', function ($row) {
                return "<div class='d-flex align-items-center'>
                    <div class='symbol symbol-40 symbol-sm flex-shrink-0'>
                        <img class='' src='{$row->img}' alt='photo'>
                    </div>
                    <div class='ml-4'>
                        <div class='text-dark-75 font-weight-bolder font-size-lg mb-0'>{$row->name}</div>
                    </div>
                </div>";
            })
            ->editColumn('category', function ($row) {
                return $row->category->name;
            })
            ->editColumn('status', function ($row) {
                $class = self::statuses()[$row->status]['class'];
                $text = self::statuses()[$row->status]['text'];
                return "<span class='label label-lg font-weight-bold  label-light-{$class} label-inline'>{$text}</span>";
            })
            ->editColumn('actions', function ($row) {
                $statusAction = self::statuses()[$row->status]['action'];
                return view('providers.products.actions', compact('row', 'statusAction'));
            })
            ->make(true);
    }

    protected static function statuses()
    {
        $statuses = [
           self::STATUS_WAITING_ACTIVATION => [
                'text' => 'في انتظار التفعيل',
                'action' => 'تفعيل',
                'class' => 'warning'
           ],
           self::STATUS_ACTIVATETD => [
               'text' => 'مفعل',
               'action' => 'إيقاف',
               'class' => 'success',
           ],
           self::STATUS_DEACTIVATED => [
               'text' => 'موقوف',
               'action' => 'تفعيل',
               'class' => 'danger',
           ]
        ];

        return $statuses;
    }

}
