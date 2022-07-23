<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW vw_borrowers_record AS
                    SELECT tbl_borrowers.id, tbl_borrowers.member_code, tbl_members.first_name, tbl_members.last_name,
                    tbl_documents.document_code, tbl_document_type.short_desc AS doc_type_desc, tbl_genre.short_desc AS genre_desc,
                    tbl_categories.short_desc AS category_desc, tbl_maturity.short_desc AS maturity_type,
                    tbl_document_records.doc_title, tbl_document_records.isbn_number, tbl_document_records.author_code,
                    tbl_authors.author_name, tbl_document_records.publication_year,
                    tbl_borrowers.from_date, tbl_borrowers.to_date, tbl_borrowers.is_checked_out, tbl_borrowers.is_returned, tbl_borrowers.status,
                    tbl_borrowers.borrower_type AS transaction_type, tbl_borrowers_type.description, tbl_borrowers.remarks,
                    tbl_borrowers.created_at, tbl_borrowers.updated_at
                    FROM
                    tbl_borrowers, tbl_document_records, tbl_authors, tbl_borrowers_type, tbl_members, tbl_documents, tbl_document_type, tbl_genre, tbl_categories, tbl_maturity
                    WHERE tbl_document_records.document_code = tbl_borrowers.document_code AND
                    tbl_authors.author_code = tbl_document_records.author_code AND
                    tbl_borrowers_type.borrower_type_id = tbl_borrowers.borrower_type AND
                    tbl_members.member_code = tbl_borrowers.member_code AND
                    tbl_documents.document_code = tbl_borrowers.document_code AND tbl_document_type.doc_type_code = tbl_documents.doc_type_code AND
                    tbl_genre.genre_code = tbl_documents.genre_code AND tbl_categories.category_code = tbl_documents.category_code AND tbl_maturity.maturity_code = tbl_documents.maturity_code;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vw_borrowers_record;");
    }
};
