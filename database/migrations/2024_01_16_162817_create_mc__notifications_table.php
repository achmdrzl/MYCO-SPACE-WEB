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
        Schema::create('mc_notifications', function (Blueprint $table) {
            $table->bigIncrements('notification_id');
            $table->unsignedBigInteger('fk_booking');
            $table->unsignedBigInteger('fk_memberpic');
            $table->string('v_subject', 50);
            $table->string('v_location', 50);
            $table->string('v_spaces', 50);
            $table->string('v_description', 200);
            $table->tinyInteger('b_isread')->default(0);
            $table->string('v_createdby', 200)->nullable();
            $table->string('v_updatedby', 200)->nullable();
            $table->string('v_deletedby', 200)->nullable();
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
        Schema::dropIfExists('mc__notifications');
    }
};
