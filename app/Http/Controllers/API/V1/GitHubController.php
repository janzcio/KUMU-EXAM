<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GithubUsernameRequest;
use App\Http\Resources\GitHubAccountInfoCollection;
use App\Http\Resources\GitHubAccountInfoResource;
use App\Services\GitHub\GithubInfoByUsername;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GitHubController extends Controller
{
    /**
     * Reqest for an account details
     */
    public function index(
                            GithubInfoByUsername $githubInfoByUsername,
                            GithubUsernameRequest $githubUsernameRequest
                        )
    {
        $response = $githubInfoByUsername->execute($githubUsernameRequest->input('usernames')); 
        return new GitHubAccountInfoCollection($response);;
    }
}
