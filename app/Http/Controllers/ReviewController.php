<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        $reviews = $this->reviewService->getAll();
        return ReviewResource::collection($reviews);
    }

    public function show($id)
    {
        $review = $this->reviewService->find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return new ReviewResource($review);
    }

    public function store(CreateReviewRequest $request)
    {
        $review = $this->reviewService->create($request->validated());
        return new ReviewResource($review);
    }

    public function update(CreateReviewRequest $request, $id)
    {
        $review = $this->reviewService->update($id, $request->validated());
        return new ReviewResource($review);
    }

    public function destroy($id)
    {
        $this->reviewService->delete($id);
        return response()->json(['message' => 'Review deleted successfully']);
    }
}
