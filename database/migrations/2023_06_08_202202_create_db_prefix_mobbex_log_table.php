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
    Schema::create('DB_PREFIX_mobbex_log', function (Blueprint $table) {
        $table->increments('log_id');
        $table->text('type');
        $table->text('message');
        $table->text('data');
        $table->dateTime('creation_date')->nullable();        
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DB_PREFIX_mobbex_log');
    }
};
