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
        Schema::create('DB_PREFIX_mobbex_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->text('order_id');
            $table->text('parent');
            $table->text('childs');
            $table->text('operation_type');
            $table->text('payment_id');
            $table->text('description');
            $table->text('status_code');
            $table->text('status_message');
            $table->text('source_name');
            $table->text('source_type');
            $table->text('source_reference');
            $table->text('source_number');
            $table->text('source_expiration');
            $table->text('source_installment');
            $table->text('installment_name');
            $table->decimal('installment_amount', 18, 2);
            $table->text('installment_count');
            $table->text('source_url');
            $table->text('cardholder');
            $table->text('entity_name');
            $table->text('entity_uid');
            $table->text('customer');
            $table->text('checkout_uid');
            $table->decimal('total', 18, 2);
            $table->text('currency');
            $table->text('risk_analysis');
            $table->text('data');
            $table->text('created');
            $table->text('updated');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DB_PREFIX_mobbex_transaction');
    }
};
