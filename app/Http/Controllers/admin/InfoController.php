<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\InfoRequest;
use App\Http\Resources\InfoResource;
use App\Models\Info;

class InfoController extends Controller
{
    public function update(InfoRequest $request)
    {
        $info = Info::query()->first();
        $info->update($request->all());
        return new InfoResource($info);
    }

    public function show()
    {
        $info = Info::query()->first();
        return new InfoResource($info);
    }

}
