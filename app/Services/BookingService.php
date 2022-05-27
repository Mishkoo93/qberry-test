<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\FreezeCamera;

class BookingService
{
    public function __construct(
        private float $costPerBlock = 0.4,
        private int $length = 2,
        private int $width = 1,
        private int $height = 1,
        private int $blockVolume = 0
    )
    {
        $this->blockVolume = $this->length * $this->width * $this->height;
    }

    public function getNeededBlocks($volume): int
    {
        return (int) ceil($volume / $this->blockVolume);
    }

    public function getPrice($blocks): float|int
    {
        return $blocks * $this->costPerBlock;
    }

    /**
     * Получение первой свободной камеры по заданной температуре и обьему продуктов
     * 2м3 = 1 блок
     *
     * @param int $locationId
     * @param int $temperature
     * @param int $volume
     * @return null|FreezeCamera
     */
    public function getFreeFreezeCamera(int $locationId, int $temperature, int $volume): ?FreezeCamera
    {
        $minTemp = $temperature - 2;
        $maxTemp = $temperature + 2;
        if ($maxTemp > 0) {
            $maxTemp = 0;
        }

        return FreezeCamera::where('location_id', $locationId)
            ->whereBetween('temperature', [$minTemp, $maxTemp])
            ->where('free_blocks', '>=', $this->getNeededBlocks($volume))
            ->first();
    }

    /**
     * Создание записи бронирования
     * @param int $userId
     * @param int $freezeCameraId
     * @param int $temperature
     * @param int $blocks
     * @param int $days
     * @return Booking|null
     */
    public function createBooking(int $userId, int $freezeCameraId, int $temperature, int $blocks, int $days): ?Booking
    {
        $booking = Booking::create([
            'user_id' => $userId,
            'freeze_camera_id' => $freezeCameraId,
            'temperature' => $temperature,
            'reserved_blocks' => $blocks,
            'days' => $days,
            'cost' => $this->getPrice($blocks),
            'access_code' => \Str::random(12),
        ]);
        $this->updateFreeBlocksInFreezeCamera($freezeCameraId, $blocks);
        $this->updateFreeBlocksInLocation($freezeCameraId, $blocks);
        return $booking;
    }

    public function updateFreeBlocksInFreezeCamera(int $freezeCameraId, $blocks): bool
    {
        $freezeCamera = FreezeCamera::find($freezeCameraId);

        return $freezeCamera->update([
            'free_blocks' => $freezeCamera->free_blocks - $blocks
        ]);
    }

    public function updateFreeBlocksInLocation(int $freezeCameraId, $blocks): bool
    {
        $location = FreezeCamera::with('location')->find($freezeCameraId)->location;

        return $location->update([
            'free_blocks' => $location->free_blocks - $blocks
        ]);
    }


}
