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
        Schema::create('donation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->string('phone', 11);
			$table->smallInteger('age');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->integer('bags_num');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
            $table->foreignId('client_id')->constrained();
            $table->foreignId('blood_type_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_requests');
    }
};
