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
        Schema::create('house', function (Blueprint $table) {
            $table->id();
            $table->json('photoPaths')->nullable();
            $table->string('homeType');
            $table->unsignedSmallInteger('noFloors');
            $table->unsignedSmallInteger('noBedrooms');
            $table->unsignedSmallInteger('noFullBathrooms');
            $table->unsignedInteger('maxHouseWidth');
            $table->unsignedInteger('maxHouseLength');
            $table->unsignedInteger('landSize');
            $table->unsignedInteger('yearBuilt');
            $table->string('furnishedStatus');
            $table->string('garageType');
            $table->string('sellType');
            $table->unsignedInteger('price');
            $table->string('email');
            $table->string('phoneNumber', 20);
            $table->string('county');
            $table->string('coordinates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house');
    }
};
