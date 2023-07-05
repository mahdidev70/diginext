<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Requests\CommentCreateRequest;
use App\Repository\Interface\CommentRepositoryInterface;

class CommentController extends Controller
{
    private CommentRepositoryInterface $repository;

    public function __construct(CommentRepositoryInterface $orderRepository)
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
            'data' => new CommentResource($result),
        ], 201);
    }

    public function store(CommentCreateRequest $request)
    {
        $type = ucfirst(str_replace('api/','',$request->route()->getPrefix()));
        
        $method = "store{$type}Comment";
        $result = $this->repository->$method($request->toArray());
        return response()->json([
            'status' => 201,
            'message' => __('message.success_store'),
            'data' => new CommentResource($result),
        ], 201);
    }
}
