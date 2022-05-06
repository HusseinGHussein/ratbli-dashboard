<?php

namespace App\Services;

use App\Models\Category;
use Yajra\DataTables\DataTables;

class CategoryService
{
    /**
     * Get all data for datatable
     *
     * @return void
     */
    public static function dataTable()
    {
        $categories = Category::query()
                                ->select('id', 'name', 'name_en', 'img', 'img_en', 'icon', 'is_offer', 'published')
                                ->where('id', '>', 14);

        return Datatables::of($categories)
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
            ->editColumn('name_en', function ($row) {
                return "<div class='d-flex align-items-center'>								
                    <div class='symbol symbol-40 symbol-sm flex-shrink-0'>									
                        <img class='' src='{$row->img_en}' alt='photo'>								
                    </div>								
                    <div class='ml-4'>									
                        <div class='text-dark-75 font-weight-bolder font-size-lg mb-0'>{$row->name_en}</div>																	
                    </div>							
                </div>";
            })
            ->editColumn('icon', function ($row) {
                return "<img src='{$row->icon}' style='height: 40px'>";
            })
            ->editColumn('is_offer', function ($row) {
                if ($row->is_offer == 1) {
                    return '<span class="label label-lg font-weight-bold  label-light-warning label-inline">عرض</span>';
                } else {
                    return '<span class="label label-lg font-weight-bold  label-light-primary label-inline">خدمة عادية</span>';
                }
            })
            ->editColumn('published', function ($row) {
                if ($row->published == 1) {
                    return '<span class="label label-lg font-weight-bold  label-light-success label-inline">مفعل</span>';
                } else {
                    return '<span class="label label-lg font-weight-bold  label-light-danger label-inline">معطل</span>';
                }
            })
            ->editColumn('actions', function ($row) {
                return view('categories.actions', compact('row'));
            })
            ->make(true);
    }

}
