<?php

use Sindria\Helpers\Migrations\ZeroMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryProductPricesTable extends ZeroMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->getConnection())->create('history_product_prices', function (Blueprint $table) {
            $table->id();
            $table->uuid('product_id');
            $table->float('sell_price', 17, 3);
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
        Schema::connection($this->getConnection())->dropIfExists('history_product_prices');
    }
}
