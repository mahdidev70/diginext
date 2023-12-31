<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserCreateRequest;
use App\Repository\Interface\UserRepositoryInterface;

class UserController extends Controller
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $orderRepository)
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
            'data' => new UserResource($result),
        ], 201);
    }

    public function store(UserCreateRequest $request)
    {
        $result = $this->repository->store($request->toArray());
        return response()->json([
            'status' => 201,
            'message' => __('message.success_store'),
            'data' => new UserResource($result),
        ], 201);
    }
}
