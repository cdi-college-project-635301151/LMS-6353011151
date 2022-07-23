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
        DB::statement("CREATE VIEW vw_documents AS
                    SELECT tbl_documents.id, tbl_documents.document_code,
                    tbl_document_records.author_code, tbl_authors.author_name, tbl_document_records.doc_title, tbl_document_records.short_desc as doc_short_desc,
                    tbl_document_records.isbn_number, tbl_document_records.publication_year,
                    tbl_document_records.quantity,
                    (SELECT count(*) FROM tbl_borrowers WHERE document_code = tbl_documents.document_code AND status = 'A' AND is_returned = 'N' AND borrower_type = '1') as reserved,
                    (SELECT count(*) FROM tbl_borrowers WHERE document_code = tbl_documents.document_code AND status = 'A' AND is_returned = 'N' AND borrower_type = '2') as loaned,
                    tbl_documents.doc_type_code, tbl_document_type.short_desc as doc_type_name,
                    tbl_maturity.maturity_code, tbl_maturity.short_desc as maturity_name, tbl_genre.genre_code, tbl_genre.short_desc as genre_name,
                    tbl_categories.category_code, tbl_categories.short_desc as category_name, tbl_documents.is_enabled,
                    tbl_documents.created_at, tbl_documents.updated_at

                    FROM

                    tbl_documents,
                    tbl_document_type,
                    tbl_maturity,
                    tbl_genre,
                    tbl_categories,
                    tbl_document_records,
                    tbl_authors

                    WHERE tbl_document_type.doc_type_code = tbl_documents.doc_type_code AND
                    tbl_maturity.maturity_code = tbl_documents.maturity_code AND
                    tbl_genre.genre_code = tbl_documents.genre_code AND
                    tbl_categories.category_code = tbl_documents.category_code AND
                    tbl_document_records.document_code=tbl_documents.document_code AND
                    tbl_authors.author_code=tbl_document_records.author_code;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vw_documents;");
    }
};
