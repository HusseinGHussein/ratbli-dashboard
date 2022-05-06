<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use App\Helpers\LoggerHelper;
use App\Services\ProductService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;

class ProductController extends Controller
{
    protected $loggerHelper;

    public function __construct(LoggerHelper $loggerHelper)
    {
        $this->loggerHelper = $loggerHelper;
    }

    public function listAll()
    {
        if (request()->expectsJson()) {
            return ProductService::dataTable();
        }

        return view('products.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\User  $provider
     * @return \Illuminate\Http\Response
     */
    public function index(User $provider)
    {
        if (request()->expectsJson()) {
            return ProductService::dataTable($provider->id);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $provider)
    {
        $provider->load(['categories', 'sections' => function ($section) {
            return $section->active();
        }]);

        $weekDays = [6 => "السبت", 0 => "الاحد", 1 => "الاثنين", 2 => "الثلاثاء", 3 => "الاربعاء", 4 => "الخميس", 5 => "الجمعة"];

        return view('products.create', compact('provider', 'weekDays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Products\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, User $provider)
    {
        $folder = 'products/' . Carbon::now()->year . '/' . Carbon::now()->month . '/';

        DB::beginTransaction();

        try {
            $product = new Product;
            $product->name = $request->name;
            $product->name_en = $request->name_en;
            $product->desc = $request->desc;
            $product->desc_en = $request->desc_en;
            $product->cat_id = $request->category_id;
            $product->user_id = $provider->id;
            $product->min_quantity = $request->min_quantity;
            $product->status = $request->status;
            $product->gender = $request->gender;
            $product->price = $request->price;
            $product->requirement = ($request->requirement) ?? '';
            $product->max_num = 2;
            $product->is_product = 1;
            $product->is_hidden = 0;
            $product->views = 0;

            if($request->has('image')) {
                $img = $request->image;
                Storage::disk('s3')->move("temp/products/{$img}", $folder.$img);
                $product->img = Storage::disk('s3')->url($folder.$img);
            }


            if ($request->has('is_express')) {
                $product->is_express = 1;
                $product->express_delivery_time = $request->express_delivery_time;
            }

            $product->save();

            $product->sections()->sync($request->sections);

            //Add product availability
            foreach ($request->quantity as $k => $genderIdx) {
                foreach ($genderIdx as $Idx => $value) {
                    foreach ($value as $key => $v) {
                        $product->productAvailabilities()->create([
                            'day_no' => $k,
                            'gender' => $Idx,
                            'period' => $key,
                            'quantity' => $v
                        ]);
                    }
                }
            }

            //Add product images
            foreach ($request->input('images', []) as $image) {
                Storage::disk('s3')->move("temp/products/{$image}", $folder.$image);

                $product->productImages()->create([
                    'pic' => Storage::disk('s3')->url($folder.$image)
                ]);
            }

            $this->loggerHelper->store('product', $product->id, "تم إنشاء منتج {$product->name} رقم {$product->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('providers.show', $provider);
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->loadCount('productImages');

        return view('products.show.product-info', compact('product'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load(['provider.categories', 'productImages', 'provider.sections' => function ($section) {
            return $section->active();
        }]);

        $weekDays = [6 => "السبت", 0 => "الاحد", 1 => "الاثنين", 2 => "الثلاثاء", 3 => "الاربعاء", 4 => "الخميس", 5 => "الجمعة"];

        $productSections = $product->sections()->pluck('section_id')->all();

        $productAvailabilities = [];

        foreach ($product->productAvailabilities as $productAvailability) {
            $productAvailabilities[$productAvailability->day_no][$productAvailability->gender][$productAvailability->period] = $productAvailability->quantity;
        }

        return view('products.edit', compact('product', 'weekDays', 'productSections', 'productAvailabilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Products\UpdateProductRequest $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $folder = 'products/' . Carbon::now()->year . '/' . Carbon::now()->month . '/';

        DB::beginTransaction();

        try {
            $product->name = $request->name;
            $product->name_en = $request->name_en;
            $product->desc = $request->desc;
            $product->desc_en = $request->desc_en;
            $product->cat_id = $request->category_id;
            $product->min_quantity = $request->min_quantity;
            $product->status = $request->status;
            $product->gender = $request->gender;
            $product->price = $request->price;
            $product->requirement = ($request->requirement) ?? '';
            $product->max_num = 2;
            $product->is_product = 1;
            $product->is_hidden = 0;

            if ($request->has('image') && $request->image != '') {
                Storage::disk('s3')->delete(getFolderPath($product->img));

                $img = $request->image;
                Storage::disk('s3')->move("temp/products/{$img}", $folder.$img);
                $product->img = Storage::disk('s3')->url($folder.$img);
            }

            if ($request->has('is_express')) {
                $product->is_express = 1;
                $product->express_delivery_time = $request->express_delivery_time;
            }

            $product->save();

            $product->sections()->sync($request->sections);

            //update product availability
            $product->productAvailabilities()->delete();

            foreach ($request->quantity as $k => $genderIdx) {
                foreach ($genderIdx as $Idx => $value) {
                    foreach ($value as $key => $v) {
                        $product->productAvailabilities()->create([
                            'day_no' => $k,
                            'gender' => $Idx,
                            'period' => $key,
                            'quantity' => $v
                        ]);
                    }
                }
            }

            //Add product images
            foreach ($request->input('images', []) as $image) {
                Storage::disk('s3')->move("temp/products/{$image}", $folder.$image);

                $product->productImages()->create([
                    'pic' => Storage::disk('s3')->url($folder.$image)
                ]);
            }

            $this->loggerHelper->store('product', $product->id, "تم تعديل منتج {$product->name} رقم {$product->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('providers.show', $product->user_id);
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function deleteProductImage(ProductImage $productImage)
    {
        $id = $productImage->id;

        Storage::disk('s3')->delete(getFolderPath($productImage->pic));

        $productImage->delete();

        return response()->json(['success' => true, 'id' => $id, 'message' => 'تم حذف الصورة بنجاح']);
    }
}
