<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('freeze_camera_id')->constrained('freeze_cameras')->cascadeOnUpdate()->cascadeOnDelete();
            $table->tinyInteger('temperature')->default(0);
            $table->unsignedSmallInteger('reserved_blocks')->default(0); // 1 block = 2m3
            $table->unsignedTinyInteger('days')->default(1);
            $table->double('cost', 15, 8)->default(0);
            $table->string('access_code', 12)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
