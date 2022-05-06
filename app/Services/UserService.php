<?php

namespace App\Services;

use App\Models\User;
use Yajra\DataTables\DataTables;

class UserService
{
    const IS_ADMIN = 1;
    const IS_VENDOR = 2;
    const IS_USER = 3;

    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable()
    {
        $users = User::query()->select('id', 'user_name', 'email', 'phone', 'pic', 'is_admin', 'is_vendor', 'verified', 'created_at');

        self::filterWithType($users);

        self::filterWithStatus($users);

        self::filterWithCreatedAt($users);

        return Datatables::of($users)
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
            ->editColumn('type', function($row) {
                if ($row->is_admin) {
                    return '<span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">أدمن</span>';
                } elseif ($row->is_vendor) {
                    return '<span class="label label-info label-dot mr-2"></span><span class="font-weight-bold text-info">مزود خدمة</span>';
                } else {
                    return '<span class="label label-warning label-dot mr-2"></span><span class="font-weight-bold text-warning">عميل</span>';
                }
            })
            ->editColumn('status', function ($row) {
                if ($row->verified) {
                    return '<span class="label label-lg font-weight-bold  label-light-success label-inline">مفعل</span>';
                } else {
                    return '<span class="label label-lg font-weight-bold  label-light-danger label-inline">معطل</span>';
                }
            })
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d', strtotime($row->created_at));
            })
            ->editColumn('actions', function ($row) {
                return view('users.actions', compact('row'));
            })
            ->make(true);
    }

    public static function filterWithType($query)
    {
        if (request()->has('type') && request()->get('type') != '' && in_array(request()->get('type'), [self::IS_ADMIN, self::IS_VENDOR, self::IS_USER])) {
            if (request()->get('type') == self::IS_ADMIN) {
                $query = $query->where('is_admin', '=', 1);
            } else if (request()->get('type') == self::IS_VENDOR) {
                $query = $query->where('is_vendor', '=', 1);
            } else if (request()->get('type') == self::IS_USER) {
                $query = $query->where([
                    ['is_admin', '=', 0],
                    ['is_vendor', '=', 0]
                ]);
            }
        }
    }

    public static function filterWithStatus($query)
    {
        if (request()->has('status') && request()->get('status') !='' && in_array(request()->get('status'), [0, 1])) {
            $query->where('verified', '=', request()->get('status'));
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
