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
        Schema::create('tbl_members', function (Blueprint $table) {
            $table->increments('member_id');
            $table->string('member_code', 20);
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->string('telephone', 15);
            $table->string('email')->unique();
            $table->timestamps();

            $table->index('member_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_members');
    }
};
