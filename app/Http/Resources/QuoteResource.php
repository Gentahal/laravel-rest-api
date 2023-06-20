<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {       
        //resource ini merupakan respon untuk data yang diambil
            return [
                'id' => $this->id,
                'message' => $this->message,
                'user' => new UserResource($this->user),
            ];
    }
}