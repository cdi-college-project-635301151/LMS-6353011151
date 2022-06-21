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
        Schema::create('tbl_document_records', function (Blueprint $table) {
            $table->id();
            $table->string('document_code', 20);
            $table->string('doc_title', 75);
            $table->string('short_desc', 100);
            $table->string('isbn_number', 15)->nullable();
            $table->string('author_code', 20);
            $table->integer('publication_year');
            $table->integer('quantity');
            $table->char('is_enabled', 1);
            $table->timestamps();

            $table->index('document_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_document_records');
    }
};
