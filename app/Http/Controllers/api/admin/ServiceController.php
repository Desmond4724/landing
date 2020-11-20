<?php

namespace App\Http\Controllers\api\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ServiceRequest;
use App\Http\Resources\admin\ServiceResource;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return ServiceResource::collection(Service::query()->paginate(15));
    }

    public function store(ServiceRequest $request)
    {
        $service = new Service($request->all());
        $service->save();
        return new ServiceResource($service);
    }

    public function show(Service $service)
    {
        return new ServiceResource($service);
    }

    public function update(Service $service, ServiceRequest $request)
    {
        $service->update($request->all());
        return new ServiceResource($service);
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return response([
            "data" => null,
            "message" => "Deleted successfully"
        ]);
    }
}
