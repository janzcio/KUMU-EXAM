<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\GitHubAccountInfoResource;
use App\Services\GitHub\GithubInfoByUsernameInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GitHubController extends Controller
{
    /**
     * Reqest for an account details
     */
    public function index($userName = null, GithubInfoByUsernameInfo $githubInfoByUsernameInfo)
    {
        // Cache::flush();
        if (is_null($userName)) {
            return $this->generateBadRequest();
        }

        $key = "github_username_{$userName}";

        $response = Cache::get($key);

        if (!$response) {
            $response = $githubInfoByUsernameInfo->execute($userName); 

            if (!$response) {
                return $this->generateNoFoundResponse("No record found.");
            }
            Cache::add($key, $response, 60*2);
        }

        return $this->generateSuccess(new GitHubAccountInfoResource($response));
    }
}
