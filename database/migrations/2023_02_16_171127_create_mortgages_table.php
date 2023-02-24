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
        Schema::create('mortgages', function (Blueprint $table) {
            $table->id();
            $table->string('net_income');
            $table->string('requested_amount');
            $table->foreignId('time_id')->constrained('time_comunication');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('expert_id')->constrained('experts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgages');
    }
};
