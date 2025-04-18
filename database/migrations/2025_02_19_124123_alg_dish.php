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

            $table->foreignId('dishid')->references('id')->on('dishes')->onDelete('cascade');

            $table->foreignId('alg')->references('id')->on('allergens')->nullable()->onDelete('cascade');


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
