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
        Schema::create('mc_invoices', function (Blueprint $table) {
            $table->bigIncrements('invoice_id');
            $table->string('v_code', 50);
            $table->unsignedBigInteger('fk_invoiceutama');
            $table->unsignedBigInteger('fk_booking');
            $table->unsignedBigInteger('fk_memberpic');
            $table->string('v_location', 50);
            $table->string('v_title', 20);
            $table->string('v_name', 50);
            $table->string('v_email', 50);
            $table->string('v_email2', 50);
            $table->string('v_email3', 50);
            $table->string('v_email4', 50);
            $table->string('v_email5', 50);
            $table->string('v_phone', 20);
            $table->text('v_address');
            $table->double('i_subtotal', 11, 2);
            $table->double('i_discount', 11, 2);
            $table->double('i_tax', 11, 2);
            $table->double('i_total', 11, 2);
            $table->double('i_dp', 11, 2);
            $table->dateTime('dt_due');
            $table->string('v_token', 200);
            $table->unsignedBigInteger('i_print');
            $table->unsignedBigInteger('i_send');
            $table->dateTime('dt_send');
            $table->tinyInteger('b_ispaid')->nullable()->comment('1=Paid, 0=Unpaid');
            $table->dateTime('dt_paid');
            $table->string('v_paymenttype', 50);
            $table->string('v_proof', 200);
            $table->date('dt_uploadproof');
            $table->tinyInteger('b_confirmed')->nullable()->comment('1=Paid, 0=Unpaid');
            $table->dateTime('dt_confirmed');
            $table->tinyInteger('b_renewal')->default(1)->comment('1=New, 2=Renewal, 3=Monthly Payment');
            $table->tinyInteger('b_hasdeposit')->default(0);
            $table->tinyInteger('b_deposit')->default(0);
            $table->tinyInteger('b_overtime')->default(0);
            $table->text('v_notes');
            $table->string('v_createdby', 200);
            $table->string('v_updatedby', 200);
            $table->string('v_deletedby', 200);
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
        Schema::dropIfExists('mc__invoices');
    }
};
