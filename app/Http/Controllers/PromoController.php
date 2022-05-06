<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\LoggerHelper;
use App\Services\PromoService;
use App\Models\{Category, Promo};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\{DB, View};

class PromoController extends Controller
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
            return PromoService::dataTable();
        }

        return View::make('promos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('promos.create', [
            'categories' => Category::published()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateData($request);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->all()]);
        }

        DB::beginTransaction();

        try {
            $promo = new Promo;
            $promo->name = $request->name;
            $promo->start_date = Carbon::parse($request->start_date)->foramt('Y-m-d H:i:s');
            $promo->end_date = Carbon::parse($request->end_date)->foramt('Y-m-d H:i:s');
            $promo->type = $request->type;
            $promo->value = $request->value;
            $promo->with_delivery = $request->with_delivery;
            $promo->min_discount = $request->min_discount;
            $promo->max_discount = $request->max_discount;
            $promo->max_limit = $request->max_limit;
            $promo->category_id = $request->category_id;
            $promo->status = ($request->status) ? 1 : 0;

            $promo->save();

            $this->loggerHelper->store('promo', $promo->id, "تم إنشاء كود خصم {$promo->name} رقم {$promo->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            //return back()->withInput();
        }

        return response()->json(['success' => true, 'message' => 'تم الحفظ بنجاح!']);
        //return redirect()->route('promos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        return View::make('promos.show.promo-info', [
            'promo' => $promo
        ])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return View::make('promos.edit', [
            'promo' => $promo,
            'categories' => Category::published()->get(),
            'promoCategories' => unserialize($promo->category_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'max_limit' => ['required', 'numeric', 'gte:max_discount'],
        ]);

        DB::beginTransaction();

        try {
            $promo->start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
            $promo->end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
            $promo->max_limit = $request->max_limit;
            $promo->status = ($request->status) ? 1 : 0;

            $promo->save();

            $this->loggerHelper->store('promo', $promo->id, "تم تعديل كود خصم {$promo->name} رقم {$promo->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('promos.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        //
    }

    private function validateData(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'type' => ['required'],
            'value' => ['required'],
            'with_delivery' => ['required'],
            'min_discount' => ['required', 'numeric', 'min:1'],
            'max_discount' => ['required', 'numeric', 'min:1'],
            'max_limit' => ['required', 'numeric', 'min:1', 'gte:max_discount'],
            'category_id.*' => ['required'],
            'category_id' => ['required'],
        ]);
    }
}
