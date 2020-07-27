<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Sindria\Helpers\Migrations\MarketplaceMigration;

class CreateUserAccountsTable extends MarketplaceMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->getConnection())->create('user_accounts', function (Blueprint $table) {
            $table->uuid('id');
            $table->tinyInteger('user_type_id');
            $table->string('username')->unique();
            $table->string('email_address')->unique();
            $table->string('password');
            $table->string('phone_number')->unique();
            $table->string('whatsapp_number')->unique()->nullable();
            $table->boolean('newsletter_subscription')->default(1);
            $table->timestamp('account_verified_at')->nullable();
            $table->string('account_verified_on')->nullable()->comment("Kolom ini berisikan media verifikasi terjadi dimana. Misal, email atau handphone");
            $table->rememberToken();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->getConnection())->dropIfExists('user_accounts');
    }
}
