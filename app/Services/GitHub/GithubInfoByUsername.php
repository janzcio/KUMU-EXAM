<?php

namespace App\Services\GitHub;
use App\Services\GitHub\RequestToGithubByUsername;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

class GithubInfoByUsername
{
    /**
     * @var IsUserActive
     */
    private $requestToGithubByUsername;

    public function __construct(RequestToGithubByUsername $requestToGithubByUsername)
    {
        $this->requestToGithubByUsername = $requestToGithubByUsername;
    }
    /**
     * Get Github acount info by username
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function execute($userNames)
    {     
        $data = [];
        $cache_hit_indicator = 'github';

        foreach ($userNames as $username) {
            $key = "github_username_{$username}";

            $response = Cache::get($key);

            if (!$response) {

                $response = $this->requestToGithubByUsername->execute($username);

                if (!$response) {
                    $response = null;
                }
                $cache_hit_indicator = "github";
                Cache::add($key, $response, 60*2);
            }else{
                $cache_hit_indicator = "cache";
            }

            if (!is_null($response)) {
                $response->cache_hit_indicator = $cache_hit_indicator;
                $data[] = $response;
            }
            
        }
        return $data;
    }
}
