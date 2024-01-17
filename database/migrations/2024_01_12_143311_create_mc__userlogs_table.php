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
        Schema::create('mc_userlogs', function (Blueprint $table) {
            $table->bigIncrements('userlog_id');
            $table->unsignedBigInteger('fk_user');
            $table->string('v_activity', 50);
            $table->text('v_description');
            $table->string('v_createdby', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mc__userlogs');
    }
};
