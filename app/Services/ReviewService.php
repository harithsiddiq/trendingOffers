<?php

namespace App\Services;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewService
{
    public function index($storeId = null)
    {
        if ($storeId) {
            return Review::with('user')->where('store_id', $storeId)->get();
        }
        return Review::with('user')->get();
    }

    public function store(Request $request)
    {
        return Review::create($request->all());
    }

    public function show($id)
    {
        return Review::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->update($request->all());
        return $review;
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return response(null, 204);
    }
}
