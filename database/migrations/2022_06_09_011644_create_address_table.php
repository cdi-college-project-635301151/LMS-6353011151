<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_address', function (Blueprint $table) {
            $table->id();
            $table->string('member_code', 20);
            $table->string('street_name', 50);
            $table->string('city', 30);
            $table->string('province', 5);
            $table->string('postal', 8);
            $table->char('is_active', 1);
            $table->timestamps();

            $table->foreign('member_code')->references('member_code')->on('tbl_members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_address');
    }
};
