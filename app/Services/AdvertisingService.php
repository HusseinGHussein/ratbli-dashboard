<?php

namespace App\Services;

use App\Models\Advertising;
use Yajra\DataTables\DataTables;

class AdvertisingService
{
    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable()
    {
        $advertisings = Advertising::query()
                                ->select('id', 'type_id', 'start_date', 'end_date', 'goal', 'amount', 'advertiser')
                                ->with(['advertisingType:id,name']);

        return Datatables::of($advertisings)
            ->editColumn('advertisingType', function ($row) {
                return $row->advertisingType->name;
            })
            ->editColumn('actions', function ($row) {
                return view('advertisings.actions', compact('row'));
            })
            ->make(true);
    }

}
