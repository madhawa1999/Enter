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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->date('bill_date');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->decimal('balance_amount', 10, 2);
            $table->enum('payment_status', ['pending', 'partial', 'paid', 'overdue'])->default('pending');
            $table->string('payment_method')->nullable(); // cash, card, insurance, etc.
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('tax', 8, 2)->default(0);
            $table->json('services')->nullable(); // consultation, lab tests, etc.
            $table->json('medicines')->nullable(); // prescribed medicines
            $table->decimal('room_charges', 8, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
