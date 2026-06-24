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
        $table->text('facilities')->nullable();
        $table->integer('capacity')->nullable();
    });
}

    public function down(): void
{
    Schema::table('homestays', function (Blueprint $table) {
        $table->dropColumn(['facilities', 'capacity']);
    });
}
    
};
