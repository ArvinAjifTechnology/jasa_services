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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_motorcycle_id')->nullable();
            $table->unsignedBigInteger('mechanic_id')->nullable();
            $table->unsignedBigInteger('type_of_service_id')->nullable();
            $table->float('total_amount');
            $table->enum('status', ['pending', 'in_queue', 'in_process', 'completed'])->default('pending');
            $table->string('queue_number')->nullable();
            $table->string('transaction_code')->unique();
            $table->enum('payment_method', ['BNI', 'BRI', 'GOPAY', 'OVO', 'DANA', 'SHOPPE'])->nullable();
            $table->enum('payment_status', ['unpaid','paid', 'verified', 'canceled'])->default('unpaid');
            $table->string('payment_proof')->nullable(); // Kolom untuk menyimpan nama file bukti pembayaran
            
            // Menambahkan foreign key untuk hubungan dengan tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Menambahkan foreign key untuk hubungan dengan tabel user_motorcycles
            $table->foreign('user_motorcycle_id')->references('id')->on('user_motorcycles')->onDelete('cascade');

            // Menambahkan foreign key untuk hubungan dengan tabel type_of_services
            $table->foreign('type_of_service_id')->references('id')->on('type_of_services')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
