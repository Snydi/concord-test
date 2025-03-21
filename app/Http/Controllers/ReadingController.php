<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetReadingRequest;
use App\Http\Requests\StoreReadingRequest;
use App\Services\ReadingService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;


class ReadingController extends Controller
{
    protected ReadingService $readingService;

    public function __construct(ReadingService $readingService)
    {
        $this->readingService = $readingService;
    }

    public function index(GetReadingRequest $request): JsonResponse
    {
        $period = $request->query('period', '7d');
        $startDate = Carbon::now()->sub($period);
        return response()->json($this->readingService->getSensorData($startDate));
    }

    public function store(StoreReadingRequest $request): JsonResponse
    {
        $readingTypeId = $request->query('sensor');
        $stringValue = $request->getContent();
        $this->readingService->addSensorValue($readingTypeId, $stringValue);
        return response()->json(['status' => 'success']);
    }
}
