<?php

namespace App\Services\GitHub;

class GithubInfoByUsernameInfo
{
    /**
     * Get Github acount info by username
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function execute($userName)
    {        
        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
                ->get("https://api.github.com/users/{$userName}");

        return json_decode($request->getBody()->getContents());
    }
}
