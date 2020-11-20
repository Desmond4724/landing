<?php

namespace App\Http\Controllers\api\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\admin\FeatureRequest;
use App\Http\Resources\admin\FeatureResource;
use App\Models\Feature;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function store(FeatureRequest $request)
    {
        $feature = new Feature($request->all());
        $feature->save();
        return new FeatureResource($feature);
    }

    public function show(Feature $feature)
    {
        return new FeatureResource($feature);
    }

    public function index()
    {
        return FeatureResource::collection(Feature::query()->paginate(15));
    }

    public function update (Feature $feature, FeatureRequest $request) {
        $feature->update($request->all());
        return new FeatureResource($feature);
    }

    public function destroy (Feature $feature) {
        Storage::delete($feature->icon);
        if ($feature->delete()) {
            return \response([
                "message" => "Deleted successfully",
                "data" => null
            ]);
        }
    }
}
