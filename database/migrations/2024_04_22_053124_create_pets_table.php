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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->string('pet_image');
            $table->string('pet_name');
            $table->string('pet_type');
            $table->string('pet_breed');
            $table->string('pet_age');
            $table->string('pet_gender');
            $table->string('pet_vaccination');
            $table->string('criteria_one');
            $table->string('criteria_two');
            $table->string('criteria_three');
            $table->string('criteria_four');
            $table->string('donation_reason');
            $table->string('vaccination_certificate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
