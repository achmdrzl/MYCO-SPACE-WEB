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
        Schema::create('mc_booking_facility', function (Blueprint $table) {
            $table->bigIncrements('bookingfacility_id', 20);
            $table->unsignedBigInteger('fk_company');
            $table->unsignedBigInteger('fk_spaces');
            $table->string('v_location', 50);
            $table->dateTime('dt_start')->nullable();
            $table->dateTime('dt_end')->nullable();
            $table->integer('i_pcs')->nullable();
            $table->text('v_notes');
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
        Schema::dropIfExists('mc__booking__facilities');
    }
};
