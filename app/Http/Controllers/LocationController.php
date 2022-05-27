<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Services\BookingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Locations
 *
 * APIs for managing with locations
 */
class LocationController extends Controller
{

    /**
     * Get all locations with free blocks
     *
     * @response scenario=success {
     *  "id": 1,
     *  "location": "Уилмингтон (Северная Каролина)",
     *  "free_blocks": 150
     * }
     *
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index(): JsonResponse|AnonymousResourceCollection
    {
        return LocationResource::collection(Location::all());
    }

    /**
     * Calculate cost and blocks
     *
     * Возвращает freeze_camera_id подходящей камеры хранения или null в случае если
     * подходящих камер не нашлось
     *
     * @response scenario=success {
     *  "blocks": 4,
     *  "cost": 19.4,
     *  "availability": true,
     *  "freeze_camera_id": null|150,
     * }
     *
     * @param CalculateRequest $request
     * @param BookingService $service
     * @return JsonResponse
     */
    public function calculate(CalculateRequest $request, BookingService $service): JsonResponse
    {
        $getFreezeCamera = $service->getFreeFreezeCamera(
            locationId: $request->location_id,
            temperature: $request->temperature,
            volume: $request->volume
        );

        $blocks = $service->getNeededBlocks($request->volume);
        return response()->json([
            'blocks' => $blocks,
            'cost' => $service->getPrice($blocks),
            'availability' => (bool) $getFreezeCamera,
            'freeze_camera_id' => $getFreezeCamera?->id
        ]);
    }
}
