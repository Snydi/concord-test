<?php

namespace App\Repositories;

use App\Models\Reading;
use Illuminate\Database\Eloquent\Collection;

class ReadingRepository implements ReadingRepositoryInterface
{
    public function all(): Collection
    {
        return Reading::with('readingType')->get();
    }

    public function create(array $data): void
    {
        Reading::create($data);
    }
}
