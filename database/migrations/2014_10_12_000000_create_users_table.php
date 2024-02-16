<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('age');
            $table->decimal('height', 10, 2);
            $table->decimal('weight', 10, 2);
            $table->enum('gender', ['male', 'female']); 
            $table->string('password');
            $table->enum('role', ['user', 'admin']); 
            $table->enum('status', ['active', 'not active']); 
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
