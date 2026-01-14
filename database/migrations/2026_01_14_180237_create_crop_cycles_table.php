<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('crop_cycles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('crop_type');
            $table->string('location')->nullable();
            $table->date('sowing_date');
            $table->date('estimated_harvest_date')->nullable();
            $table->enum('status', ['in_progress', 'harvested'])->default('in_progress');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_cycles');
    }
};
