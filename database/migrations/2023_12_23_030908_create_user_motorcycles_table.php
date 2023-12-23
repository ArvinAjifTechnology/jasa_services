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
        Schema::create('user_motorcycles', function (Blueprint $table) {
            $table->id();
            Schema::create('user_motorcycles', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('motorcycle_brand');
                $table->string('motorcycle_model');
                $table->integer('manufacturing_year');
                $table->timestamps();
            
                // Menambahkan foreign key untuk hubungan dengan tabel users
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_motorcycles');
    }
};
