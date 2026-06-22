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
    Schema::table('homestays', function (Blueprint $table) {
        // Buang ->after('capacity') supaya ia tidak mencari kolum capacity
        $table->string('property_type')->nullable();
        $table->unsignedTinyInteger('star_rating')->default(5);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homestays', function (Blueprint $table) {
            //
        });
    }
};
