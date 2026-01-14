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
        Schema::create('crop_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crop_cycle_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->date('date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_stages');
    }
};
