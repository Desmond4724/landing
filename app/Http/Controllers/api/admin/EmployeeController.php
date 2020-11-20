<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\api\ApiController;
use App\Http\Requests\admin\EmployeeRequest;
use App\Http\Resources\admin\EmployeeResource;
use App\Models\Employee;
use App\Models\Social;
use function GuzzleHttp\Promise\all;

class EmployeeController extends ApiController
{
    public function index()
    {
        $employees = Employee::query()->paginate(15);
        return EmployeeResource::collection($employees);
    }

    public function store(EmployeeRequest $request)
    {

        $socials = collect($request->input('socials'));
        $data = $request->except('socials');
        $employee = new Employee($data);
        $employee->save();
        $socials = $socials->map(function ($item) use ($employee) {
            return [
                "value" => $item['value'],
                "social_id" => $item['id'],
                'employee_id' => $employee->id
            ];
        });

        $employee->socials()->createMany($socials->toArray());
        $employee->load('socials');
        dd($employee);
    }
}
