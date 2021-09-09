<?php

namespace App\Services\GitHub;
use GuzzleHttp\Exception\RequestException;

class GithubInfoByUsernameInfo
{
    /**
     * Get Github acount info by username
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function execute($userName)
    {        
        try {
            $httpClient = new \GuzzleHttp\Client();
            $request =  $httpClient
                        ->get("https://api.github.com/users/{$userName}");
        } catch (RequestException $e) {
            return false;
        }

        return json_decode($request->getBody()->getContents());
    }
}
