<?php

namespace App\Repository\Interface;

interface PostRepositoryInterface 
{
    public function show($id);
    public function store($request);
}
