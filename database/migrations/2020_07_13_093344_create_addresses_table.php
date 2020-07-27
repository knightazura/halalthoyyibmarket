<?php

use Sindria\Helpers\Migrations\ZeroMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends ZeroMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->getConnection())->create('addresses', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('street_name');
            $table->string('subdistrict')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('zipcode');
            $table->string('country_code')->default('ID');
            $table->geometry('map_location')->nullable();
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
        Schema::connection($this->getConnection())->dropIfExists('addresses');
    }
}
