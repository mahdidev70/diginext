<?php

namespace App\Repository\Interface;

interface CommentRepositoryInterface 
{
    public function show($id);
    public function storeVideoComment($request);
    public function storePostComment($request);
}
