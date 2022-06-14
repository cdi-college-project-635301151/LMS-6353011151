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
        Schema::create('tbl_books_maturity', function (Blueprint $table) {
            $table->id();
            $table->string('maturity_code', 20);
            $table->string('short_desc', 50);
            $table->string('long_desc', 150);
            $table->char('is_enabled', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_books_maturity');
    }
};
