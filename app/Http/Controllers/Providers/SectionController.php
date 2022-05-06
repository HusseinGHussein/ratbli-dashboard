<?php

namespace App\Http\Controllers\Providers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Helpers\LoggerHelper;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
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
            $sections = Section::query()
                ->select('id', 'name', 'status')
                ->where('provider_id', auth()->user()->id);

            return Datatables::of($sections)
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="label label-lg font-weight-bold  label-light-success label-inline">مفعل</span>';
                    } else {
                        return '<span class="label label-lg font-weight-bold  label-light-danger label-inline">معطل</span>';
                    }
                })
                ->editColumn('actions', function ($row) {
                    return "<button type='button' class='btn btn-sm btn-clean showLogs' data-id={$row->id}' data-type='section' title='الحركات'>
                        <i class='flaticon-list'></i>
                    </button>
                    <a href='javascript:;' data-id='{$row->id}' class='btn btn-sm btn-clean btn-icon btn-icon-md showEditSectionModal' title='تعديل'>
                        <i class='la la-edit'></i>
                    </a>";
                })
                ->make(true);
        }

        return view('vendors.sections.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $section = Section::where([
            ['provider_id', '=', auth()->user()->id],
            ['name', '=', $request->name]
        ])->first();

        if ($section) {
            return response()->json(['errors' => ["القسم {$request->name} موجود بالفعل"]]);
        }

        $section = new Section;
        $section->provider_id = auth()->user()->id;
        $section->name = $request->name;
        $section->status = $request->status;

        $section->save();

        $this->loggerHelper->store('section', $section->id, "تم إنشاء قسم {$section->name} رقم {$section->id}");

        return response()->json(['success' => 'Data added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return view('vendors.sections.show.section-info', compact('section'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $checkSection = Section::where([
            ['id', '<>', $section->id],
            ['name', '=', $request->name]
        ])->first();

        if ($checkSection) {
            return response()->json(['errors' => ["القسم {$request->name} موجود بالفعل"]]);
        }

        $section->name = $request->name;
        $section->status = $request->status;

        $section->save();

        $this->loggerHelper->store('section', $section->id, "تم تعديل قسم {$section->name} رقم {$section->id}");

        return response()->json(['success' => 'Data added successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}
