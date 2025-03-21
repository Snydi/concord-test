<?php

namespace App\Services;

use App\Repositories\ReadingRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ReadingService
{
    protected ReadingRepository $readingRepository;

    public function __construct(ReadingRepository $readingRepository)
    {
        $this->readingRepository = $readingRepository;
    }

    public function getSensorData(): Collection
    {
        $data = $this->readingRepository->all();
        $data = $data->groupBy('readingType.name');

        return $data->map(function ($readings, $type) {
            $timestamps = [];
            $values = [];
            foreach ($readings as $reading) {
                $timestamp = Carbon::parse($reading->created_at);
                $timestamps[] = $timestamp->format('M j, Y');
                $values[] = $reading->value;
            }

            return [
                'labels' => $timestamps,
                'datasets' => [
                    [
                        'label' => $type,
                        'data' => $values,
                        'borderColor' => 'red',
                        'fill' => false
                    ]
                ]
            ];
        })->values();
    }
}
