<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRequest;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Services\BookingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @group Booking management
 *
 * APIs for managing bookings users
 */
class BookingController extends Controller
{

    /**
     * Get all bookings by user
     *
     * @response scenario=success {
     *  "data": [{"id: 1, "location": "Уилмингтон (Северная Каролина)", "temperature": -5, "reserved_blocks": 10, "reserved_to": "2022-05-31", "cost": 12.5, "access_code": "68iqeVTYcwKf"},{"id: 1, "location": "Уилмингтон (Северная Каролина)", "temperature": -5, "reserved_blocks": 10, "reserved_to": "2022-05-31", "cost": 12.5, "access_code": "68iqeVTYcwKf"}],
     * }
     *
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index(): JsonResponse|AnonymousResourceCollection
    {
        // return BookingResource::collection(Booking::with('freeze_camera.location')->where('user_id', 1)->get());
    }

    /**
     * Create a booking.
     *
     * Создание брони
     *
     * @response scenario=success {
     *  "data": {"id: 1, "location": "Уилмингтон (Северная Каролина)", "temperature": -5, "reserved_blocks": 10, "reserved_to": "2022-05-31", "cost": 12.5, "access_code": "68iqeVTYcwKf"},
     * }
     *
     * @param StoreBookingRequest $request
     * @param BookingService $service
     * @return BookingResource
     */
    public function store(StoreBookingRequest $request, BookingService $service): BookingResource
    {
        /*
         * 1. Сюда приходит камера, температура, блоки, дни
         * 2. Создаем запись в букинге. Вычитаем свободные блоки.
         */
        return new BookingResource($service->createBooking(
            userId: 1, // для теста, \Auth::id(),
            freezeCameraId: $request->freeze_camera_id,
            temperature: $request->temperature,
            blocks: $request->blocks,
            days: $request->days
        ));
    }

    /**
     * Display booking.
     *
     * Отобразить бронирование для входа с ключем доступа
     *
     * @response scenario=success {
     *  "data": {"id: 1, "location": "Уилмингтон (Северная Каролина)", "temperature": -5, "reserved_blocks": 10, "reserved_to": "2022-05-31", "cost": 12.5, "access_code": "68iqeVTYcwKf"},
     * }
     * @response status=404 scenario="booking not found" {"message": "Booking not found"}
     *
     * @param string $id
     * @return BookingResource
     */
    public function show(string $id): BookingResource
    {
        // return new BookingResource(Booking::findOrFail($id));
    }
}
