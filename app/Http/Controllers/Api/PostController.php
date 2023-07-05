<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\PostCreateRequest;
use App\Repository\Interface\PostRepositoryInterface;

class PostController extends Controller
{
    private PostRepositoryInterface $repository;

    public function __construct(PostRepositoryInterface $orderRepository)
    {
        $this->repository = $orderRepository;
    }

    /**
     * @LRDparam id numeric|required
     */
    public function show($id)
    {
        $result = $this->repository->show($id);
        return response()->json([
            'status' => 201,
            'message' => __('message.success'),
            'data' => new PostResource($result),
        ], 201);
    }

    public function store(PostCreateRequest $request)
    {
        $result = $this->repository->store($request->toArray());
        return response()->json([
            'status' => 201,
            'message' => __('message.success_store'),
            'data' => new PostResource($result),
        ], 201);
    }
}
