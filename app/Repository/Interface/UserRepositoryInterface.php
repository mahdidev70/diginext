<?php

namespace App\Repository\Interface;

interface UserRepositoryInterface 
{
    public function show($id);
    public function store($request);
}
