<?php

namespace App\Http\Controllers\Providers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductException;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductExceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        if (request()->expectsJson()) {
            $productExceptions = ProductException::query()
                            ->select('id', 'date')
                            ->where('product_id', $product->id)
                            ->latest();

            return Datatables::of($productExceptions)
                ->editColumn('actions', function ($row) {
                    $deleteUrl = route('provider.product-exceptions.destroy', $row);
                    return "<a href='javascript:;' data-url='{$deleteUrl}' class='btn btn-sm btn-danger btn-icon btn-icon-md deleteDate' title='حذف'>
                        <i class='la la-trash'></i>
                    </a>";
                })
                ->make(true);
            }

        return view('vendors.product-exceptions.index', compact('product'));
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
    public function store(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $dates = getDatesFromRange($request->start_date, $request->end_date);

        $productExceptionDates = ProductException::where('product_id', '=', $product->id)->pluck('date');

        foreach($productExceptionDates as $productExceptionDate) {
            if(in_array($productExceptionDate, $dates)) {
                return response()->json(['errors' => ["التاريخ {$productExceptionDate} موجود بالفعل"]]);
            }
        }

        foreach($dates as $date) {
            ProductException::create([
                'product_id' => $product->id,
                'date' => $date
            ]);
        }

        return response()->json(['success' => 'Data added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductException  $productException
     * @return \Illuminate\Http\Response
     */
    public function show(ProductException $productException)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductException  $productException
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductException $productException)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductException  $productException
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductException $productException)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductException  $productException
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductException $productException)
    {
        $productException->delete();

        return response()->json(['success' => 'Data deleted successfully']);
    }
}
