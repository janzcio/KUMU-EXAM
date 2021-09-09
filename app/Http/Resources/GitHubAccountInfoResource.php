<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GitHubAccountInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'login' => $this->login,
            'company' => $this->company,
            'number_of_followers' => $this->followers,
            'number_of_public_repositories' => $this->public_repos,
            'average_number_of_followers_per_public_repository' => (!is_null($this->public_repos) && $this->public_repos > 0) ? (floatval($this->followers) / floatval($this->public_repos)) : 0,
            'cache_hit_indicator' => $this->cache_hit_indicator,
        ];
    }
}
