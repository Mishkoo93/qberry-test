<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    protected $fillable = ["free_blocks"];

    public $timestamps = false;

    public function freeze_cameras(): HasMany
    {
        return $this->hasMany(FreezeCamera::class);
    }
}
