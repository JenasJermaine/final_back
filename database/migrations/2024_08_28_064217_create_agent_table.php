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
        Schema::create('agent', function (Blueprint $table) {
            $table->id();
            $table->string('profile_pic')->nullable(); 
            $table->string('first_and_second_name');
            $table->string('email')->unique(); 
            $table->string('phone_number');
            $table->string('county'); 
            $table->decimal('commission_rate', 5, 2); 
            $table->integer('successful_sales')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent');
    }
};
