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
        Schema::create('tbl_document_type', function (Blueprint $table) {
            $table->id();
            $table->string('doc_type_code', 20);
            $table->string('short_desc', 50);
            $table->char('is_enabled', 1);
            $table->timestamps();

            $table->index('doc_type_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_document_type');
    }
};
