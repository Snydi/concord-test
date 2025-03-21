<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReadingRequest;
use App\Services\ReadingService;
use Illuminate\Http\JsonResponse;


class ReadingController extends Controller
{
    protected ReadingService $readingService;

    public function __construct(ReadingService $readingService)
    {
        $this->readingService = $readingService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->readingService->getSensorData());
    }

    public function store(StoreReadingRequest $request): JsonResponse
    {
        //TODO add try catch
        $readingTypeId = $request->query('sensor');
        $stringValue = $request->getContent();
        $value = explode("=", $stringValue)[1];
        $this->readingService->addSensorValue($readingTypeId, $value);
        return response()->json(['status' => 'success']);
    }
}
