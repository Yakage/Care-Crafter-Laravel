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
        Schema::create('step_tracker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->integer('current_steps_per_day')->nullable();
            $table->integer('total_steps_taken')->nullable();
            $table->float('average_steps_taken')->nullable();
            $table->integer('daily_goal')->nullable();
            $table->integer('monthly_goal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('step_tracker');
    }
};
