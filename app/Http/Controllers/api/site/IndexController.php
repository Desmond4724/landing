<?php

namespace App\Http\Controllers\api\site;

use App\Http\Controllers\api\ApiController;
use App\Http\Resources\admin\EmployeeResource;
use App\Http\Resources\admin\FeatureResource;
use App\Http\Resources\admin\PortfolioResource;
use App\Http\Resources\admin\QuestionResource;
use App\Http\Resources\admin\ServiceResource;
use App\Http\Resources\Carousel as ResourcesCarousel;
use App\Http\Resources\InfoResource;
use App\Models\Carousel;
use App\Models\Employee;
use App\Models\Feature;
use App\Models\Info;
use App\Models\Portfolio;
use App\Models\Question;
use App\Models\Service;

class IndexController extends ApiController
{
    public function index()
    {
        $data = [];
        $carousel = ResourcesCarousel::collection(Carousel::all());
        $data['carousel'] = $carousel;
        $data['info'] = new InfoResource(Info::first());
        $data['features'] = FeatureResource::collection(Feature::all());
        $data['questions'] = QuestionResource::collection(Question::all());
        $data['portfolio'] = PortfolioResource::collection(Portfolio::all());
        $data['services'] = ServiceResource::collection(Service::all());
        $data['employees'] = EmployeeResource::collection(Employee::all());
        return $this->successResponse($data);
    }
}
