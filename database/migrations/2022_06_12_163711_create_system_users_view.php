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
        DB::statement('CREATE VIEW vw_system_users AS
                SELECT users.id, users.name, users.email, users.member_code,
                users.user_type, tbl_user_types.description, users.is_blocked,
                users.created_at, users.updated_at FROM
                users, tbl_user_types, tbl_members WHERE
                tbl_user_types.user_type_id=users.user_type AND tbl_members.member_code=users.member_code;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS vw_system_users');
    }
};
