<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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
        DB::statement("CREATE VIEW vw_members AS
            SELECT
            tbl_members.member_id, tbl_members.first_name, tbl_members.last_name,
            CONCAT(tbl_members.first_name, ' ', tbl_members.last_name) as full_name,
            tbl_members.telephone, tbl_members.email, tbl_members.created_at, tbl_members.updated_at, tbl_members.member_code,
            tbl_address.street_name, tbl_address.city, tbl_address.province, tbl_address.postal
            FROM tbl_members, tbl_address
            WHERE tbl_address.member_code=tbl_members.member_code AND
            tbl_members.member_code IN (SELECT member_code FROM users WHERE user_type = 3);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vw_members');
    }
};
