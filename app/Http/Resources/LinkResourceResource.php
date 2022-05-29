<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkResourceResource extends JsonResource
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
            'title'=>$this->title,
            'description'=>$this->description,
            'link_url'=>$this->link_url,
            'new_tab'=>$this->new_tab,
            'created_at'=>  date('Y-m-d H:i A', strtotime($this->created_at))
        ];
    }
}
