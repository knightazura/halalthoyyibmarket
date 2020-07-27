<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Sindria\Helpers\Migrations\MarketplaceMigration;

class CreateCustomersTable extends MarketplaceMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->getConnection())->create('customers', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('user_account_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->date('birthdate');
            $table->string('gender');
            $table->uuid('organization_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->getConnection())->dropIfExists('customers');
    }
}
