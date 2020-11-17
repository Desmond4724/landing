<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function uploadFile(FileRequest $request)
    {
        $file = $request->file('file');
        $path_file = Storage::put('files', $file);
        return response([
            'file_url' => asset('storage/' . $path_file),
            'file' => $path_file
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */

    public function deleteFile(Request $request)
    {
        $request->validate(["path" => "required"]);
        Storage::delete($request->path);
        return response([
            "message" => 'successfully deleted' . ' file ' . $request->path
        ]);

    }
}
