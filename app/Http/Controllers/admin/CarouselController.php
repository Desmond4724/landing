<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CarouselRequest;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Http\Resources\Carousel as CarouselResource;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $carousel = Carousel::query()->paginate();
        return CarouselResource::collection($carousel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CarouselRequest $request
     * @return CarouselResource
     */
    public function store(CarouselRequest $request)
    {
        $data = $request->all();
        $carousel = new Carousel($data);
        $carousel->save();
        return new  CarouselResource($carousel);
    }

    /**
     * Display the specified resource.
     *
     * @param Carousel $carousel
     * @return CarouselResource
     */
    public function show(Carousel $carousel)
    {
        return new CarouselResource($carousel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarouselRequest $request
     * @param Carousel $carousel
     * @return CarouselResource
     */
    public function update(CarouselRequest $request, Carousel $carousel)
    {
        if ($carousel->update($request->all())) {
            return new CarouselResource($carousel);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Carousel $carousel
     * @return Response
     * @throws \Exception
     */
    public function destroy(Carousel $carousel)
    {
        Storage::delete($carousel->image);
        if ($carousel->delete()) {
            return \response([
                "message" => "Deleted successfully",
                "data" => null
            ]);
        }

    }
}
