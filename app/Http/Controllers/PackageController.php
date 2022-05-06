<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Helpers\LoggerHelper;
use App\Services\PackageService;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
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
            return PackageService::dataTable();
        }

        return view('packages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create');
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
            $package = new Package;
            $package->name = $request->name;
            $package->points = $request->points;
            $package->value = $request->value;
            $package->status = ($request->status) ? 1 : 0;
            $package->factor = $request->factor;
            $package->factor_end_date = date('Y-m-d H:i:s', strtotime($request->factor_end_date));

            $package->save();

            $this->loggerHelper->store('package', $package->id, "تم إنشاء باقة خصم {$package->name} رقم {$package->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('packages.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        DB::beginTransaction();

        try {
            $package->name = $request->name;
            $package->points = $request->points;
            $package->value = $request->value;
            $package->status = ($request->status) ? 1 : 0;
            $package->factor = $request->factor;
            $package->factor_end_date = Carbon::parse($request->factor_end_date);

            $package->save();

            $this->loggerHelper->store('package', $package->id, "تم تعديل باقة خصم {$package->name} رقم {$package->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('packages.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
