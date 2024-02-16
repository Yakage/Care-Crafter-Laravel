<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('water_intake', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->float('daily_goal');
            $table->float('total_water_intake_for_the_day');
            $table->float('current_water_intake_for_the_day');
            $table->boolean('reminder');
            $table->text('today_log');
            $table->integer('reminder_interval');
            $table->float('average_volume');
            $table->float('average_completion');
            $table->integer('drink_frequency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_intake');
    }
};
