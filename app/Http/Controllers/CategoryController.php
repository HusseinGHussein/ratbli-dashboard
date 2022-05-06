<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use App\Helpers\LoggerHelper;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $loggerHelper;

    public function __construct(LoggerHelper $loggerHelper)
    {
        $this->loggerHelper = $loggerHelper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->expectsJson()) {
            return CategoryService::dataTable();
        }

        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Categories\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        DB::beginTransaction();

        try {
            $category = new Category;
            $category->name = $request->name;
            $category->name_en = $request->name_en;
            $category->desc = $request->desc;
            $category->desc_en = $request->desc_en;
            $category->published = ($request->published) ? 1 : 0;
            $category->is_offer = $request->is_offer;

            if ($request->hasFile('img')) {
                $path = $request->file('img')->storePublicly('categories', 's3');
                $category->img = Storage::disk('s3')->url($path);
            }

            if ($request->hasFile('img_en')) {
                $path = $request->file('img_en')->storePublicly('categories', 's3');
                $category->img_en = Storage::disk('s3')->url($path);
            }

            if ($request->hasFile('icon')) {
                $path = $request->file('icon')->storePublicly('categories', 's3');
                $category->icon = Storage::disk('s3')->url($path);
            }

            $category->save();

            $this->loggerHelper->store('category', $category->id, "تم إنشاء قسم جديد بعنوان {$category->name}  رقم {$category->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('categories.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Categories\UpdateCategoryRequest $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::beginTransaction();

        try {
            $category->name = $request->name;
            $category->name_en = $request->name_en;
            $category->desc = $request->desc;
            $category->desc_en = $request->desc_en;
            $category->published = ($request->published) ? 1 : 0;
            $category->is_offer = $request->is_offer;

            if ($request->hasFile('img')) {
                $path = $request->file('img')->storePublicly('categories', 's3');
                $category->img = Storage::disk('s3')->url($path);
            }

            if ($request->hasFile('img_en')) {
                $path = $request->file('img_en')->storePublicly('categories', 's3');
                $category->img_en = Storage::disk('s3')->url($path);
            }

            if ($request->hasFile('icon')) {
                $path = $request->file('icon')->storePublicly('categories', 's3');
                $category->icon = Storage::disk('s3')->url($path);
            }

            $category->save();

            $this->loggerHelper->store('category', $category->id, "تم تعديل قسم بعنوان {$category->name}  رقم {$category->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('categories.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
