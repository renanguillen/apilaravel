<?php

namespace App\Repositories;

use App\Models\Review;

class ReviewRepository
{
    public function getAll()
    {
        return Review::all();
    }

    public function findById($id)
    {
        return Review::find($id);
    }

    public function create(array $data)
    {
        return Review::create($data);
    }

    public function update($id, array $data)
    {
        $review = Review::findOrFail($id);
        $review->update($data);
        return $review;
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return true;
    }
}
