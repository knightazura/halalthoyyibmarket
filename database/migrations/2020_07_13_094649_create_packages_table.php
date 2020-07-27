<?php

use Sindria\Helpers\Migrations\ZeroMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends ZeroMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->getConnection())->create('packages', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->float('price', 17, 3);
            $table->float('total_stock_price', 20, 3);
            $table->float('sell_price', 17, 3);
            $table->float('base_shipping_fee', 17, 3);
            $table->integer('stock');
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
        Schema::connection($this->getConnection())->dropIfExists('packages');
    }
}
