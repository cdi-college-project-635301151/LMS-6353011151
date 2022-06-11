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
        DB::statement('DROP VIEW IF EXISTS vw_members');
        DB::statement("CREATE VIEW vw_members AS
            SELECT
            tbl_members.member_id, tbl_members.first_name, tbl_members.last_name, tbl_members.telephone, tbl_members.email, tbl_members.created_at, tbl_members.updated_at, tbl_members.member_code,
            tbl_address.street_name, tbl_address.city, tbl_address.province, tbl_address.postal
            FROM tbl_members, tbl_address
            WHERE tbl_address.member_code=tbl_members.member_code AND tbl_address.is_active='1'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vw_members');
    }
};
