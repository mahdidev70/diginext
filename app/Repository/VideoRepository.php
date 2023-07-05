<?php

namespace App\Repository;

use App\Models\Video;
use App\Repository\Interface\VideoRepositoryInterface;


class VideoRepository implements VideoRepositoryInterface
{
    public function show($id)
    {
        return Video::with(['user', 'comments'])->findOrFail($id);
    }

    public function store($request)
    {
        return Video::create(array_merge($request, [
            'user_id' => auth()->id()
        ]));
    }
}
