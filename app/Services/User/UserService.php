<?php

namespace App\Services\User;

use App\Models\User;

class UserService
{
    protected User $user;

    public function __construct(){
        $this->user = new User();
    }

    public function index()
    {
        return $this->user->all();
    }
}
