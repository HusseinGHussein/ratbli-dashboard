<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\LoggerHelper;
use App\Models\AdvertisingType;
use Illuminate\Support\Facades\DB;
use App\Services\AdvertisingTypeService;

class AdvertisingTypeController extends Controller
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
            return AdvertisingTypeService::dataTable();
        }

        return view('advertising-types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advertising-types.create');
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
            $advertisingType = new AdvertisingType;
            $advertisingType->name = $request->name;
            $advertisingType->status = ($request->status) ? 1 : 0;

            $advertisingType->save();

            $this->loggerHelper->store('advertisingType', $advertisingType->id, "تم إنشاء نوع دعاية بعنوان {$advertisingType->name} رقم {$advertisingType->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('advertising-types.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvertisingType  $advertisingType
     * @return \Illuminate\Http\Response
     */
    public function show(AdvertisingType $advertisingType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvertisingType  $advertisingType
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvertisingType $advertisingType)
    {
        return view('advertising-types.edit', compact('advertisingType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvertisingType  $advertisingType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertisingType $advertisingType)
    {
        DB::beginTransaction();

        try {
            $advertisingType->name = $request->name;
            $advertisingType->status = ($request->status) ? 1 : 0;

            $advertisingType->save();

            $this->loggerHelper->store('advertisingType', $advertisingType->id, "تم تعديل نوع دعاية بعنوان {$advertisingType->name} رقم {$advertisingType->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('advertising-types.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvertisingType  $advertisingType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertisingType $advertisingType)
    {
        //
    }
}
