<?php

namespace App\Services;

use App\Models\Promo;
use Yajra\DataTables\DataTables;

class PromoService
{
    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable()
    {
        $promos = Promo::query()
                    ->select('id', 'name', 'type', 'value', 'status', 'start_date', 'end_date')
                    ->where('is_voucher', '=', 0);

        if(request()->has('toggleExpired') && request()->get('toggleExpired') == 'on') {
            $promos = $promos->toggleExpired(true);
        } else {
            $promos = $promos->toggleExpired();
        }

        return Datatables::of($promos)
            ->editColumn('type', function ($row) {
                if ($row->type == 'percentage') {
                    return '<span class="label label-lg font-weight-bold  label-light-warning label-inline">نسبة</span>';
                } else {
                    return '<span class="label label-lg font-weight-bold  label-light-primary label-inline">قيمة</span>';
                }
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    return '<span class="label label-lg font-weight-bold  label-light-success label-inline">مفعل</span>';
                } else {
                    return '<span class="label label-lg font-weight-bold  label-light-danger label-inline">معطل</span>';
                }
            })
            ->editColumn('start_date', function ($row) {
                return date('Y-m-d', strtotime($row->start_date));
            })
            ->editColumn('end_date', function ($row) {
                return date('Y-m-d', strtotime($row->end_date));
            })
            ->editColumn('actions', function ($row) {
                return view('promos.actions', compact('row'));
            })
            ->make(true);
    }

}
