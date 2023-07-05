<?php

namespace App\Repository;

use App\Models\Post;
use App\Repository\Interface\PostRepositoryInterface;


class PostRepository implements PostRepositoryInterface
{
    public function show($id)
    {
        return Post::with(['user', 'comments'])->findOrFail($id);
    }

    public function store($request)
    {
        return Post::create(array_merge($request, [
            'user_id' => auth()->id()
        ]));
    }
}
