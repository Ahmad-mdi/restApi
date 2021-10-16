<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
//    public static $wrap = 'hassan';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
          'id' => $this->id,
          'title' => strtoupper($this->title),
          'content' => $this->content,
          'created_at' => $this->created_at/*->format('Y-m-d H:i:m')*/,
        ];
    }
}
