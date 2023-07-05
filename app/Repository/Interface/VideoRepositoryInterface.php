<?php

namespace App\Repository\Interface;

interface VideoRepositoryInterface 
{
    public function show($id);
    public function store($request);
}
