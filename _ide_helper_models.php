<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Booking
 *
 * @property int $id
 * @property int $user_id
 * @property int $freeze_camera_id
 * @property int $temperature
 * @property int $reserved_blocks
 * @property int $days
 * @property float $cost
 * @property string $access_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\FreezeCamera $freeze_camera
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereAccessCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereFreezeCameraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereReservedBlocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUserId($value)
 */
	class Booking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FreezeCamera
 *
 * @property int $id
 * @property int $location_id
 * @property int $temperature
 * @property int $blocks
 * @property int $free_blocks
 * @property-read \App\Models\Location $location
 * @method static \Database\Factories\FreezeCameraFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeCamera newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeCamera newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeCamera query()
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeCamera whereBlocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeCamera whereFreeBlocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeCamera whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeCamera whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreezeCamera whereTemperature($value)
 */
	class FreezeCamera extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Location
 *
 * @property int $id
 * @property string|null $name
 * @property string $timezone
 * @property int $free_blocks
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FreezeCamera[] $freeze_cameras
 * @property-read int|null $freeze_cameras_count
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereFreeBlocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereTimezone($value)
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Booking[] $bookings
 * @property-read int|null $bookings_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

