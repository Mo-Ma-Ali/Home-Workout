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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('Current_weight')->default(0);
            $table->integer('age');
            $table->integer('height');
            $table->enum('gender',['feminine','man']);
            $table->integer('Target_weight')->default(0);
            $table->double('Time_to_reach_the_specified_weight')->default(0);
            $table->integer('Calories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
