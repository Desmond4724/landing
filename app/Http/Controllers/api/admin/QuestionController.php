<?php

namespace App\Http\Controllers\api\admin;



use App\Http\Controllers\api\ApiController;
use App\Http\Requests\admin\QuestionRequest;
use App\Http\Resources\admin\QuestionResource;
use App\Models\Question;

class QuestionController extends ApiController
{
    public function index()
    {
        return QuestionResource::collection(Question::query()->paginate(15));
    }

    public function store(QuestionRequest $request)
    {
        $question = new Question($request->all());
        $question->save();
        return new QuestionResource($question);

    }

    public function update(Question $question, QuestionRequest $request)
    {
        $question->update($request->all());
        return new QuestionResource($question);

    }

    public function show(Question $question)
    {
        return new QuestionResource($question);

    }

    public function destroy(Question $question)
    {
        $question->delete();

        return \response([
            "message" => "Deleted successfully"
        ]);

    }
}
