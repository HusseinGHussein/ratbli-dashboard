<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        //$folder = 'products/' . Carbon::now()->year . '/' . Carbon::now()->month . '/';

        $folder = 'temp/products/';
        
        $file = $request->file;

        $name = sha1(time() . $file->getClientOriginalName());
        $extension = $file->getClientOriginalExtension();
        $fileName = "{$name}.{$extension}";

        $file->storePubliclyAs($folder, $fileName, 's3');

        return response()->json(['status' => true, 'fileName' => $fileName]);
    }

    public function base64Upload(Request $request)
    {
        $folder = 'temp/products/';

        $file = $request->file;

        list($type, $file) = explode(';', $file);
        list(, $file)      = explode(',', $file);
        $file = base64_decode($file);

        $fileName = time() . '.png';
        $filePath = $folder . $fileName;

        Storage::disk('s3')->put($filePath, $file, 'public');

        return response()->json(['status' => true, 'fileName' => $fileName]);
    }
}
