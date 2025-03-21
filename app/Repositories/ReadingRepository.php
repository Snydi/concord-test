<?php

namespace App\Repositories;

use App\Models\Reading;
use Illuminate\Database\Eloquent\Collection;

class ReadingRepository implements ReadingRepositoryInterface
{
    public function all(string $startDate): Collection
    {
        return Reading::with('readingType')
            ->where('created_at', '>=', $startDate)
            ->orderBy('created_at')
            ->get();
    }

    public function create(array $data): void
    {
        Reading::create($data);
    }
}
