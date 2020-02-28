<?php

namespace App\Repositories\User;

use App\Http\Requests\UserRequest;

interface UserRepositoryInterface
{
    public function uploadImage($image);

    public function store($data);

}
