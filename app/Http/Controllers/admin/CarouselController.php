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
     * @return Response
     */
    public function index()
    {
        $carousel = Carousel::query()->simplePaginate();
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
        $image = $request->file('image');
        $data = $request->all();
        $data['image'] = Storage::put('public/files', $image);
        $carousel = new Carousel($data);
        $carousel->save();
        return new  CarouselResource($carousel);
    }

    /**
     * Display the specified resource.
     *
     * @param Carousel $carousel
     * @return Response
     */
    public function show(Carousel $carousel)
    {
        return new CarouselResource($carousel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
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
        if ($carousel->delete()) {
            return \response([
                "message" => "Deleted successfully",
                "data" => null
            ]);
        }

    }
}
