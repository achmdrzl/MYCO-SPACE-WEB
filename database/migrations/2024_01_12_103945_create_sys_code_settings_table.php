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
        Schema::create('sys_code_settings', function (Blueprint $table) {
            $table->bigIncrements('code_id');
            $table->string('v_table', 50);
            $table->string('v_code', 50);
            $table->integer('i_digit');
            $table->string('v_separator', 1);
            $table->string('v_dateformat', 20);
            $table->integer('i_count');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_code_settings');
    }
};
