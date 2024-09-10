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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('product');
            $table->string('section');
            $table->decimal('discount');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->string('rate_tax');
            $table->bigInteger( 'section_id' )->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->decimal('Amount_collection',20,2)->nullable();;
            $table->decimal('Amount_Commission',20,2);
            $table->decimal('value_tax',20,2);
            $table->decimal('total',20,2);
            $table->string('status',50);
            $table->integer('value_status');
            $table->text('note')->nullable();
            $table->string('Payment_Date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
