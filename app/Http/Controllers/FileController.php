<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class FileController extends Controller
{
    public function upload(FileUploadRequest $request){
        $fields = $request->validated();

        $file = $request->file('file_target');
        $alias = uniqid().'_'.time();
        $name = $file->getClientOriginalName();
        $extention = $file->getClientOriginalExtension();
        $mime = $file->getMimeType();

        $path = Storage::putFileAs('files', $file, $alias.'.'.$extention);

        $file_uploaded = File::create([
            'name' => $name,
            'path' => '/storage/'.$alias.'.'.$extention,
            'alias' => $alias,
            'extension' => $extention,
            'mime' => $mime,
        ]);

        if(!$file_uploaded){
            return response()->json([
                'message' => 'File upload Failed.'
            ]);
        }

        return Inertia::render('DataSetProcessing', [
            'read_target' => base64_encode(file_get_contents($file->getRealPath())),
            'file_name' => $name.'.'.$extention,

        ]);
    }
}
