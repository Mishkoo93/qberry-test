<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "freeze_camera_id", "temperature", "reserved_blocks", "days", "cost", "access_code"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function freeze_camera()
    {
        return $this->belongsTo(FreezeCamera::class);
    }
}
