<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "image" => $this->image,
            "image_url" => $this->image_url,
            "phone" => $this->phone,
            "email" => $this->email,
            "address" => $this->address,
            "lat" => $this->lat,
            "lng" => $this->lng,
            "telegram" => $this->telegram
        ];
    }
}
