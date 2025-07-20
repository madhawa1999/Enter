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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('position'); // nurse, receptionist, cleaner, technician, etc.
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('employee_id')->unique();
            $table->date('hire_date');
            $table->decimal('salary', 10, 2);
            $table->enum('shift', ['morning', 'evening', 'night', 'rotational'])->default('morning');
            $table->enum('status', ['active', 'inactive', 'on_leave', 'terminated'])->default('active');
            $table->json('qualifications')->nullable();
            $table->text('address');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
