<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function uploadFile(FileRequest $request)
    {
        $file = $request->file('file');
        $path_file = Storage::put('files', $file);
        return response(asset('storage/' . $path_file));
    }
}
