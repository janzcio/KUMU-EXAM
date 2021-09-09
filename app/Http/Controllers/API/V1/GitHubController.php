<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\GitHubAccountInfoResource;
use App\Services\GitHub\GithubInfoByUsernameInfo;
use Illuminate\Http\Request;

class GitHubController extends Controller
{
    /**
     * Reqest for an account details
     */
    public function index($userName = null, GithubInfoByUsernameInfo $githubInfoByUsernameInfo)
    {
        if (is_null($userName)) {
            return $this->generateBadRequest();
        }

        $response = $githubInfoByUsernameInfo->execute($userName);

        return $this->generateSuccess(new GitHubAccountInfoResource($response));
    }
}
