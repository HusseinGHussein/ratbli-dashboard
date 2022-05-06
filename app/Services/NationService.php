<?php

namespace App\Services;

use App\Models\Nation;
use Yajra\DataTables\DataTables;

class NationService
{
    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable()
    {
        $nations = Nation::query()
            ->select('id', 'name', 'code', 'currency_name', 'currency_code', 'status', 'flag');

        return Datatables::of($nations)
            ->editColumn('name', function ($row) {
                $imgUrl = asset($row->flag);
                return "<div class='d-flex align-items-center'>								
                    <div class='symbol symbol-40 symbol-sm flex-shrink-0'>									
                        <img class='' src='{$imgUrl}' alt='photo'>								
                    </div>								
                    <div class='ml-4'>									
                        <div class='text-dark-75 font-weight-bolder font-size-lg mb-0'>{$row->name}</div>																	
                    </div>							
                </div>";
            })
            ->editColumn('code', function ($row) {
                return "<span dir='ltr'>{$row->code}</span>";
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    return '<span class="label label-lg font-weight-bold  label-light-success label-inline">مفعل</span>';
                } else {
                    return '<span class="label label-lg font-weight-bold  label-light-danger label-inline">معطل</span>';
                }
            })
            ->editColumn('actions', function ($row) {
                return view('nations.actions', compact('row'));
            })
            ->make(true);
    }

}
