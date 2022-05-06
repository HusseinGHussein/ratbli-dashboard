<?php

namespace App\Http\Controllers\Providers;

use Exception;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProductImage;
use App\Helpers\LoggerHelper;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;

class ProductController extends Controller
{
    const STATUS_WAITING_ACTIVATION = 0;
    const STATUS_ACTIVATETD = 1;
    const STATUS_DEACTIVATED = 2;

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
            $products = Product::query()
                            ->select('id', 'name', 'cat_id', 'views', 'img', 'price', 'status', 'max_num', 'min_quantity')
                            ->with('category')
                            ->where('user_id', auth()->user()->id);


            if(request()->has('status') && in_array(request()->get('status'), [0, 1, 2]) && request()->get('status') != '') {
                $products = $products->where('status', '=', request()->get('status'));
            }

            return Datatables::of($products)
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
                ->editColumn('category', function ($row) {
                    return $row->category->name;
                })
                ->editColumn('status', function ($row) {
                    $class = self::statuses()[$row->status]['class'];
                    $text = self::statuses()[$row->status]['text'];
                    return "<span class='label label-lg font-weight-bold  label-light-{$class} label-inline'>{$text}</span>";
                })
                ->editColumn('actions', function ($row) {
                    return view('vendors.products.actions', compact('row'));
                })
                ->make(true);
            }

        return view('vendors.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provider = auth()->user();

        $provider->load(['categories', 'sections' => function ($section) {
            return $section->active();
        }]);

        $weekDays = [6 => "السبت", 0 => "الاحد", 1 => "الاثنين", 2 => "الثلاثاء", 3 => "الاربعاء", 4 => "الخميس", 5 => "الجمعة"];

        return view('vendors.products.create', compact('provider', 'weekDays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
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
            $product->user_id = auth()->user()->id;
            $product->min_quantity = $request->min_quantity;
            $product->status = ($request->status) ? 1 : 0;
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

            return redirect()->route('provider.products.index');
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
        //
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

        return view('vendors.products.edit', compact('product', 'weekDays', 'productSections', 'productAvailabilities'));
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
            $product->status = ($request->status) ? 1 : 0;
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

            return redirect()->route('provider.products.index');
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

    protected static function statuses()
    {
        $statuses = [
            self::STATUS_WAITING_ACTIVATION => [
                'text' => 'في انتظار التفعيل',
                'action' => 'تفعيل',
                'class' => 'warning'
            ],
            self::STATUS_ACTIVATETD => [
                'text' => 'مفعل',
                'action' => 'إيقاف',
                'class' => 'success',
            ],
            self::STATUS_DEACTIVATED => [
                'text' => 'موقوف',
                'action' => 'تفعيل',
                'class' => 'danger',
            ]
        ];

        return $statuses;
    }
}
