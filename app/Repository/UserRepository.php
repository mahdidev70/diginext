<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Interface\UserRepositoryInterface;


class UserRepository implements UserRepositoryInterface
{
    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store($request)
    {
        return User::create($request);
    }
}
