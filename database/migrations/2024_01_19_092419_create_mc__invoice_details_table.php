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
        Schema::create('mc_invoice_details', function (Blueprint $table) {
            $table->bigIncrements('invoicedetail_id');
            $table->unsignedBigInteger('fk_invoice')->nullable();
            $table->string('v_spaces', 50);
            $table->unsignedBigInteger('i_qty')->nullable();
            $table->unsignedBigInteger('i_unit')->default(1);
            $table->string('v_unit', 50)->nullable();
            $table->string('v_periode', 50)->nullable();
            $table->double('i_amount', 11, 2)->nullable();
            $table->double('i_discount', 11, 2)->nullable();
            $table->double('i_subtotal', 11, 2)->nullable();
            $table->text('v_notes')->nullable();
            $table->string('v_createdby', 50);
            $table->string('v_updatedby', 50);
            $table->string('v_deletedby', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('b_status')->default(1)->comment('1=Active, 0=Inactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mc__invoice_details');
    }
};
