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
            $table->foreignId('user_id')->nullable()->constrained();
            $table->float('daily_goal')->nullable();
            $table->float('total_intake')->nullable();
            $table->float('current_intake')->nullable();
            $table->boolean('reminder')->nullable();
            $table->text('today_log')->nullable();
            $table->integer('reminder_interval')->nullable();
            $table->float('average_volume')->nullable();
            $table->float('average_completion')->nullable();
            $table->integer('drink_frequency')->nullable();
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
