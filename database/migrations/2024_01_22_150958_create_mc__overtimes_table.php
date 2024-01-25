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
        Schema::create('mc_overtime', function (Blueprint $table) {
            $table->bigIncrements('overtime_id');
            $table->string('v_code');
            $table->unsignedBigInteger('fk_company')->default(0);
            $table->unsignedBigInteger('fk_memberpic')->default(0);
            $table->dateTime('dt_overtime')->nullable();
            $table->time('tm_start')->nullable();
            $table->time('tm_end')->nullable();
            $table->tinyInteger('b_invoiced')->default(0);
            $table->unsignedBigInteger('fk_invoice')->default(0);
            $table->text('v_notes')->nullable();
            $table->string('v_createdby')->default(0);
            $table->string('v_updatedby')->default(0);
            $table->string('v_deletedby')->default(0);
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
        Schema::dropIfExists('mc__overtimes');
    }
};
