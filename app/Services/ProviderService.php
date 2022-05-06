<?php

namespace App\Services;

use App\Models\User;
use Yajra\DataTables\DataTables;

class ProviderService
{
    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable()
    {
        $providers = User::query()
                        ->select('id', 'user_name', 'email', 'phone', 'pic', 'is_vendor', 'blocked', 'created_at')
                        ->withCount(['products', 'orders'])
                        ->where('is_vendor', 1);

        self::filterWithStatus($providers);

        self::filterWithCreatedAt($providers);

        return Datatables::of($providers)
            ->editColumn('user_name', function ($row) {
                return "<div class='d-flex align-items-center'>								
                    <div class='symbol symbol-40 symbol-sm flex-shrink-0'>									
                        <img class='' src='{$row->pic}' alt='photo'>								
                    </div>								
                    <div class='ml-4'>									
                        <div class='text-dark-75 font-weight-bolder font-size-lg mb-0'>{$row->user_name}</div>																	
                    </div>							
                </div>";
            })
            ->editColumn('phone', function ($row) {
                return "<span dir='ltr'>{$row->phone}</span>";
            })
            ->editColumn('status', function ($row) {
                if ($row->blocked == 0) {
                    return '<span class="label label-lg font-weight-bold  label-light-success label-inline">مفعل</span>';
                } else {
                    return '<span class="label label-lg font-weight-bold  label-light-danger label-inline">معطل</span>';
                }
            })
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d', strtotime($row->created_at));
            })
            ->editColumn('actions', function ($row) {
                return view('providers.actions', compact('row'));
            })
            ->make(true);
    }

    public static function filterWithStatus($query)
    {
        if (request()->has('status')) {
            if (request()->get('status') == 1) {
                $query = $query->where('blocked', '=', 0);
            } else if (request()->get('status') == 2) {
                $query = $query->where('blocked', '=', 1);
            } else {
                return;
            }
        }
    }

    public static function filterWithCreatedAt($query)
    {
        if (request()->has('start_date') and request()->get('start_date') != '') {
            if (request()->has('end_date') and request()->get('end_date') != '') {
                $query->whereDate('created_at', '>=', request()->get('start_date'))
                      ->whereDate('created_at', '<=', request()->get('end_date'));
            } else {
                $query->whereDate('created_at', '=', request()->get('start_date'));
            }
        }
    }

}
