<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function getAll()
    {
        return $this->reviewRepository->getAll();
    }

    public function find($id)
    {
        return $this->reviewRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->reviewRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->reviewRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->reviewRepository->delete($id);
    }
}
