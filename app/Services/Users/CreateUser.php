<?php

namespace App\Services\Users;
use App\Models\User;

class CreateUser
{
   /**
    * Get User By Email
    */
    public function execute($param)
    {
        return User::create([
            'name' => $param['name'],
            'password' => bcrypt($param['password']),
            'email' => $param['email']
        ]);
    }
}
