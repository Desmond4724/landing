<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CarouselRequest extends FormRequest
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
        $is_method_post = $this->method() === 'POST';
        $rules = [
            'title' => ['string'],
            "description" => ['string'],
            "image" => ['image']
        ];
        if($is_method_post) {
            $rules['title'][1] = 'required';
            $rules['image'][1] = 'required';
        }

        return $rules;
    }
}
