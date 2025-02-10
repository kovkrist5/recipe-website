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
        Schema::create('alg_dish', function (Blueprint $table) {
            
            $table->foreignId('algId')->references('id')->on('allergens');
            $table->foreignId('dishId')->references('id')->on('dishes');
            

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
