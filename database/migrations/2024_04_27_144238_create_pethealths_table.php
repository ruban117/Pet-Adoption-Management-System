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
        Schema::create('pethealths', function (Blueprint $table) {
            $table->id();
            $table->integer('pet_id');
            $table->integer('new_owner_id');
            $table->integer('old_owner_id');
            $table->string('Image');
            $table->string('Certificate');
            $table->string('Content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pethealths');
    }
};
