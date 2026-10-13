<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rental_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained('rentals')->onDelete('cascade');
            $table->foreignId('equipment_id')->constrained('equipments')->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });

        DB::statement(
            'ALTER TABLE rental_details
            ADD CONSTRAINT chk_rental_details_quantity
            CHECK (quantity > 0)'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_details');
    }
};
