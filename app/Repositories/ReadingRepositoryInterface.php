<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ReadingRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): void;
}
