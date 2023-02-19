<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('paid_at')->nullable();
            $table->unsignedInteger('amount')->default(0);
            $table->string('paid_month');
            $table->string('paid_year');
            $table->char('nisn', 10);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('school_fee_id')->constrained('school_fees')->cascadeOnDelete();
            $table->foreign('nisn')->references('nisn')->on('students')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
