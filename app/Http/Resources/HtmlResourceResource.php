<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HtmlResourceResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'html_snipped'=>$this->html_snipped,
            'created_at'=>  date('Y-m-d H:i A', strtotime($this->created_at))
        ];
    }
}
