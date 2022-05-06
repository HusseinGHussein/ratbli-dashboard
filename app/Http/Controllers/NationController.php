<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\City;
use App\Models\Nation;
use Illuminate\Http\Request;
use App\Helpers\LoggerHelper;
use App\Services\NationService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Nations\StoreNationRequest;
use App\Http\Requests\Nations\UpdateNationRequest;

class NationController extends Controller
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
            return NationService::dataTable();
        }

        return view('nations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Nations\StoreNationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNationRequest $request)
    {
        DB::beginTransaction();

        try {
            $nation = new Nation;
            $nation->name = $request->name;
            $nation->name_en = $request->name_en;
            $nation->code = $request->code;
            $nation->currency_code = $request->currency_code;
            $nation->currency_name = $request->currency_name;
            $nation->currency_name_en = $request->currency_name_en;
            $nation->status = ($request->status) ? 1 : 0;
            $nation->flag = $request->file('flag')->store('nations', 'public');
            $nation->save();

            $this->loggerHelper->store('nation', $nation->id, "تم إنشاء دولة {$nation->name} رقم {$nation->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('nations.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function show(Nation $nation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function edit(Nation $nation)
    {
        return view('nations.edit', compact('nation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Nations\UpdateNationRequest $request
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNationRequest $request, Nation $nation)
    {
        DB::beginTransaction();

        try {
            $nation->name = $request->name;
            $nation->name_en = $request->name_en;
            $nation->code = $request->code;
            $nation->currency_code = $request->currency_code;
            $nation->currency_name = $request->currency_name;
            $nation->currency_name_en = $request->currency_name_en;
            $nation->status = ($request->status) ? 1 : 0;

            if ($request->hasFile('flag')) {
                //delete old img

                //$nation->flag = $request->file('flag')->store('nations', 'public');
            }

            $nation->save();

            $this->loggerHelper->store('nation', $nation->id, "تم تعديل دولة {$nation->name} رقم {$nation->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('nations.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nation $nation)
    {
        //
    }

    /**
     * Get list of nation cities
     *
     * @param \App\Models\Nation $nationId
     * @return void
     */
    public function cities($nationId)
    {
        $cities = City::active()->where('nation_id', $nationId)->pluck('name', 'id');

        return response()->json($cities);
    }
}
