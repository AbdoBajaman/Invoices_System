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
        Schema::create('invoices_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('File_Name');
            $table->string('invoice_number', 50);
            $table->unsignedBigInteger('Invoice_Id')->nullable();
            $table->foreign('Invoice_Id')->references('id')->on('invoices')->onDelete('cascade');
            $table->string('created_by',999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices_attachments');
    }
};
