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
        Schema::create('tbl_authors', function (Blueprint $table) {
            $table->id();
            $table->string('author_code', 20);
            $table->string('author_name', 80);
            $table->char('is_enabled', 1);
            $table->timestamps();

            $table->index('author_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_authors');
    }
};
