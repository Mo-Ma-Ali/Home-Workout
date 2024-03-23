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
        Schema::create('workout_completions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('Level_id')->constrained('levels');
            $table->foreignId('category_id')->constrained('cates');
            $table->boolean('is_done');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_completions');
    }
};
