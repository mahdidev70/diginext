<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Http\Requests\VideoCreateRequest;
use App\Repository\Interface\VideoRepositoryInterface;

class VideoController extends Controller
{
    private VideoRepositoryInterface $repository;

    public function __construct(VideoRepositoryInterface $orderRepository)
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
            'data' => new VideoResource($result),
        ], 201);
    }

    public function store(VideoCreateRequest $request)
    {
        $result = $this->repository->store($request->toArray());
        return response()->json([
            'status' => 201,
            'message' => __('message.success_store'),
            'data' => new VideoResource($result),
        ], 201);
    }
}
