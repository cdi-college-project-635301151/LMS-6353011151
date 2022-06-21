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
        Schema::create('tbl_books_isbn', function (Blueprint $table) {
            $table->id();
            $table->string('isbn_code', 20);
            $table->string('isbn_desc', 12)->unique();
            $table->string('short_desc', 100);
            $table->char('is_enabled', 1);
            $table->timestamps();

            $table->index('isbn_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_books_isbn');
    }
};
