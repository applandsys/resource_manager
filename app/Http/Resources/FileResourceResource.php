<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResourceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'title'=> $this->title,
            'file_name'=> $this->file_name,
            'file_size'=> $this->file_size,
            'description'=> $this->description,
            'created_at'=>  date('Y-m-d H:i A', strtotime($this->created_at))
        ];

    }

}
