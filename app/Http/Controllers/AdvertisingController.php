<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Advertising;
use Illuminate\Http\Request;
use App\Helpers\LoggerHelper;
use App\Models\AdvertisingType;
use Illuminate\Support\Facades\DB;
use App\Services\AdvertisingService;

class AdvertisingController extends Controller
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
            return AdvertisingService::dataTable();
        }

        return view('advertisings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertisingTypes = AdvertisingType::active()->get();

        return view('advertisings.create', compact('advertisingTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $advertising = new Advertising;
            $advertising->type_id = $request->type_id;
            $advertising->start_date = $request->start_date;
            $advertising->end_date = $request->end_date;
            $advertising->goal = $request->goal;
            $advertising->amount = $request->amount;
            $advertising->advertiser = $request->advertiser;

            $advertising->save();

            $this->loggerHelper->store('advertising', $advertising->id, "تم إنشاء دعاية جديدة رقم {$advertising->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('advertisings.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function show(Advertising $advertising)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertising $advertising)
    {
        $advertisingTypes = AdvertisingType::active()->get();

        return view('advertisings.edit', compact('advertisingTypes', 'advertising'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertising $advertising)
    {
        DB::beginTransaction();

        try {
            $advertising->type_id = $request->type_id;
            $advertising->start_date = $request->start_date;
            $advertising->end_date = $request->end_date;
            $advertising->goal = $request->goal;
            $advertising->amount = $request->amount;
            $advertising->advertiser = $request->advertiser;

            $advertising->save();

            $this->loggerHelper->store('advertising', $advertising->id, "تم تعديل دعاية رقم {$advertising->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('advertisings.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertising $advertising)
    {
        //
    }
}
