<?php

namespace App\Http\Controllers;

use App\Services\ReadingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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


    public function store(Request $request) //TODO make a request here
    {

    }
}
