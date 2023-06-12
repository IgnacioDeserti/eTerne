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
        Schema::create('DB_PREFIX_mobbex_custom_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('row_id')->index();
            $table->text('object');
            $table->text('field_name');
            $table->text('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DB_PREFIX_mobbex_custom_fields');
    }
};
