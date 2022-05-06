<?php

namespace App\Services;

use App\Models\AdvertisingType;
use Yajra\DataTables\DataTables;

class AdvertisingTypeService
{
    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable()
    {
        $advertisingTypes = AdvertisingType::query()
                                ->select('id','name', 'status');

        return Datatables::of($advertisingTypes)
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    return '<span class="label label-lg font-weight-bold  label-light-success label-inline">مفعل</span>';
                } else {
                    return '<span class="label label-lg font-weight-bold  label-light-danger label-inline">معطل</span>';
                }
            })
            ->editColumn('actions', function ($row) {
                return view('advertising-types.actions', compact('row'));
            })
            ->make(true);
    }

}
