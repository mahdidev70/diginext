<?php

namespace App\Repository;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use App\Repository\Interface\CommentRepositoryInterface;


class CommentRepository implements CommentRepositoryInterface
{
    public function show($id)
    {
        return Comment::findOrFail($id);
    }

    public function storeVideoComment($request)
    {
        $video = Video::findOrFail($request['id']);
        return $video->comments()->create([
            'text' => $request['text'],
            'user_id' => auth()->id()
        ]);
    }

    public function storePostComment($request)
    {
        $video = Post::findOrFail($request['id']);
        return $video->comments()->create([
            'text' => $request['text'],
            'user_id' => auth()->id()
        ]);
    }
}
