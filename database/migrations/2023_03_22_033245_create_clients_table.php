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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('phone', 11)->unique();
			$table->date('d_o_b');
			$table->date('last_donation_date');
            $table->foreignId('blood_type_id')->constrained();
            $table->foreignId('city_id')->constrained();
			$table->string('pin_code');
            $table->boolean('is_activated')->default(False);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
