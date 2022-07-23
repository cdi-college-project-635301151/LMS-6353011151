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
        Schema::create('tbl_borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('member_code', 20);
            $table->string('document_code', 20);
            $table->date('from_date');
            $table->date('to_date');
            $table->char('is_checked_out', 1)->nullable();
            $table->char('is_returned', 1);
            $table->char('status', 1);
            $table->char('remarks', 200)->nullable();
            $table->bigInteger('borrower_type')->unsigned();
            $table->timestamps();

            $table->foreign('member_code')->references('member_code')->on('tbl_members')->onDelete('cascade');
            $table->foreign('document_code')->references('document_code')->on('tbl_document_records')->onDelete('cascade');
            $table->foreign('borrower_type')->references('borrower_type_id')->on('tbl_borrowers_type')->onDelete('cascade');

            $table->index(['member_code', 'document_code', 'borrower_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_borrowers');
    }
};
