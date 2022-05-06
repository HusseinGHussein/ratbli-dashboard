<?php

namespace App\Services;

use App\Models\Package;
use Yajra\DataTables\DataTables;

class PackageService
{
    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable()
    {
        $packages = Package::query()
                                ->select('id','name', 'points', 'value', 'status', 'factor', 'factor_end_date');

        return Datatables::of($packages)
            ->editColumn('factor_end_date', function ($row) {
                return date('Y-m-d', strtotime($row->factor_end_date));
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    return '<span class="label label-lg font-weight-bold  label-light-success label-inline">مفعل</span>';
                } else {
                    return '<span class="label label-lg font-weight-bold  label-light-danger label-inline">معطل</span>';
                }
            })
            ->editColumn('actions', function ($row) {
                return view('packages.actions', compact('row'));
            })
            ->make(true);
    }

}
