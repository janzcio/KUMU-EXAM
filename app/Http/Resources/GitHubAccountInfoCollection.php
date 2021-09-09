<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GitHubAccountInfoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public $collects = 'App\Http\Resources\GitHubAccountInfoResource';

    public function toArray($request)
    {
        return [
            'status' => 'Success',
            'description' => 'OK',
            'data' => $this->collection,
        ];
    }
}
