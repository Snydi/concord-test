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

    public function getSensorData(string $startDate): Collection
    {
        $data = $this->readingRepository->all($startDate);
        $data = $data->groupBy('readingType.name');

        return $data->map(function ($readings, $type) {
            $timestamps = [];
            $values = [];
            $borderColor = 'black';

            foreach ($readings as $reading) {
                $timestamp = Carbon::parse($reading->created_at);
                $timestamps[] = $timestamp->format('M j, Y');
                $values[] = $reading->value;
                $borderColor = $reading->readingType['border_color'];
            }

            return [
                'labels' => $timestamps,
                'datasets' => [
                    [
                        'label' => $type,
                        'data' => $values,
                        'borderColor' => $borderColor,
                        'fill' => false
                    ]
                ]
            ];
        })->values();
    }

    public function addSensorValue(int $readingTypeId, string $stringValue): void
    {
        $value = explode("=", $stringValue)[1];
        $this->readingRepository->create(['reading_type_id' => $readingTypeId, 'value' => $value]);
    }
}
