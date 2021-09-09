<?php

namespace App\Services\GitHub;
use GuzzleHttp\Exception\RequestException;

class RequestToGithubByUsername
{
    /**
     * Get Github acount info by username
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function execute($username)
    {  
        try {
                $httpClient = new \GuzzleHttp\Client();
                $request =  $httpClient
                            ->get("https://api.github.com/users/{$username}");
            } catch (RequestException $e) {
                return false;
            }

        return json_decode($request->getBody()->getContents());
    }
}
