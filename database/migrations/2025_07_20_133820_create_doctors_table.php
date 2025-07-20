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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('license_number')->unique();
            $table->string('specialization');
            $table->integer('experience_years');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->text('qualification');
            $table->decimal('consultation_fee', 8, 2);
            $table->json('available_days'); // JSON array of days: ['monday', 'tuesday', etc]
            $table->time('available_time_start');
            $table->time('available_time_end');
            $table->enum('status', ['active', 'inactive', 'on_leave'])->default('active');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
