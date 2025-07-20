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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('generic_name')->nullable();
            $table->string('manufacturer');
            $table->string('category');
            $table->string('dosage_form'); // tablet, syrup, injection, etc.
            $table->string('strength'); // 500mg, 10ml, etc.
            $table->decimal('price_per_unit', 8, 2);
            $table->integer('stock_quantity');
            $table->integer('minimum_stock')->default(10);
            $table->date('expiry_date');
            $table->string('batch_number');
            $table->enum('status', ['available', 'out_of_stock', 'expired', 'recalled'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
