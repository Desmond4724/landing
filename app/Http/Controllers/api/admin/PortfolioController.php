<?php

namespace App\Http\Controllers\api\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PortfolioRequest;
use App\Http\Resources\admin\PortfolioResource;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return PortfolioResource::collection(Portfolio::query()->paginate(15));
    }


    public function store(Request $request)
    {
        $portfolio = new Portfolio($request->all());
        $portfolio->save();
        return new PortfolioResource($portfolio);
    }

    public function show(Portfolio $portfolio)
    {
        return new PortfolioResource($portfolio);
    }


    public function update(Portfolio $portfolio, PortfolioRequest $request)
    {
        $portfolio->update($request->all());
        return new PortfolioResource($portfolio);
    }


    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return response([
            "data" => null,
            "message" => "Deleted successfully!"
        ]);
    }
}
