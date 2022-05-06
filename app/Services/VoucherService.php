<?php

namespace App\Services;

use App\Models\Voucher;
use Yajra\DataTables\DataTables;

class VoucherService
{
    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable()
    {
        $vouchers = Voucher::query()
            ->select('id', 'name', 'type', 'value', 'status', 'start_date', 'end_date', 'user_id')
            ->with(['user'])
            ->where('is_voucher', '=', 1);

        if (request()->has('toggleExpired') && request()->get('toggleExpired') == 'on') {
            $vouchers = $vouchers->toggleExpired(true);
        } else {
            $vouchers = $vouchers->toggleExpired();
        }

        return Datatables::of($vouchers)
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
            ->editColumn('user', function ($row) {
                return $row->user->user_name;
            })
            ->make(true);
    }
}
