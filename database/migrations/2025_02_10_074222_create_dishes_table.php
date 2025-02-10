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
            $table->increments('id');
            $table->foreignId('courseId')->references('id')->on('courses');
            $table->string('name');
            $table->string('desc');
            $table->string('ing'); //seperate with ;
            $table->string('inst'); //seperate with ;
            $table->integer('prep'); //minutes
            $table->integer('cooktime'); //minutes
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
