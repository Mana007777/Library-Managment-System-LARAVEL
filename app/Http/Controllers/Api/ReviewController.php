<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    public function __construct(private ReviewService $service) {}

    public function index()
    {
        return ReviewResource::collection(
            Review::with('user')->get()
        );
    }

    public function store(StoreReviewRequest $request)
    {
        return new ReviewResource(
            $this->service->store($request->validated())
        );
    }

    public function destroy(Review $review)
    {
        $this->service->delete($review);
        return response()->noContent();
    }
}
