<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Sindria\Helpers\Migrations\MarketplaceMigration;

class CreateQuotesTable extends MarketplaceMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->getConnection())->create('quotes', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('customer_id');
            $table->text('cart_items');
            $table->uuid('billing_address_id');
            $table->uuid('delivery_address_id');
            $table->string('used_points')->nullable();
            $table->string('used_coupon')->nullable();
            $table->float('subtotal', 20, 3);
            $table->float('shipping_fee', 17, 3);
            $table->float('discounts', 17, 3);
            $table->float('total', 20, 3);
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
        Schema::connection($this->getConnection())->dropIfExists('quotes');
    }
}
