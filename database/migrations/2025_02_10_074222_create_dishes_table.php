<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courseId')->references('id')->on('courses');
            $table->string('name');
            $table->string('desc')->nullable();
            $table->string('img')->nullable();
            $table->string('inst')->nullable(); //seperate with ;
            $table->integer('prep')->nullable(); //minutes
            $table->integer('cooktime')->nullable(); //minutes
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
