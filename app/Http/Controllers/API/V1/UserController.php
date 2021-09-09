<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Services\Users\CreateUser;
use App\Services\Users\LoginUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * [register description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function register(
                            RegisterUserRequest $registerUserRequest, 
                            CreateUser $createUser,
                            LoginUser $loginUser
                            )
    {
        $user = $createUser->execute($registerUserRequest->all());

        return $this->generateCreatedResponse($loginUser->execute($user));
    }
}
