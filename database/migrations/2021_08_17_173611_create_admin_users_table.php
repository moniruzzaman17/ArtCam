<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('user_id');

            $table->string('name',255)
            ->nullable(false)
            ->comment = 'Admin User Name';

            $table->string('email',255)
            ->nullable(false)
            ->comment = 'Admin Email';

            $table->string('password_hash',255)
            ->nullable(false)
            ->comment = 'Password Hash';

            $table->timestamps();

            $table->string('last_log_time')
            ->nullable()
            ->comment = 'Last Login Time';

            $table->integer('lognum')->unsigned()->default(0)->nullable(false)
            ->comment = 'Total Login Time';

            $table->integer('is_active')->unsigned()->default(1)->nullable(false);

            $table->string('rp_token',255)
            ->nullable()
            ->comment = 'Password Reset Token';

            $table->string('rp_token_created_at')
            ->nullable()
            ->comment = 'Password Reset Token Created';

            $table->integer('log_failed_num')->unsigned()->default(0)->nullable(false)
            ->comment = 'Total Failed Login Time';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
