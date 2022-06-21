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
        Schema::create('tbl_documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_code', 20)->unique();
            $table->string('doc_type_code', 20);
            $table->string('maturity_code', 20);
            $table->string('genre_code', 20);
            $table->string('category_code', 20);
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
        Schema::dropIfExists('tbl_documents');
    }
};
