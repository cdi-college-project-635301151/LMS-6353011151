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
        DB::statement('DROP VIEW IF EXISTS vw_system_users');
        DB::statement('CREATE VIEW vw_system_users AS
                SELECT users.id, users.name, users.email, users.member_code,
                users.user_type, tbl_user_types.description, users.is_blocked,
                users.created_at, users.updated_at FROM
                users, tbl_user_types WHERE
                tbl_user_types.user_type_id=users.user_type');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vw_system_users');
    }
};
