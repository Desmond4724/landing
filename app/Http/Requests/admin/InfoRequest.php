<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "required|string",
            'image' => "required|string",
            "content" => "required|string",
            "phone" => "required|string|max:20",
            "email" => "required|email",
            "address" => "required|min:10",
            "lat" => "required|numeric",
            "lng" => "required|numeric",
            "telegram" => "required|string|min:15"
        ];
    }
}
