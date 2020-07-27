<?php

use Sindria\Helpers\Migrations\ZeroMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends ZeroMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->getConnection())->create('product_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('storage_id');
            $table->uuid('supplier_id');
            $table->uuid('product_id');
            $table->string('name')->nullable();
            $table->longText('note')->nullable();
            $table->float('obtain_price', 17, 3);
            $table->integer('obtained_quantity');
            $table->dateTime('obtained_at');
            $table->dateTime('expiration_approximate');
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
        Schema::connection($this->getConnection())->dropIfExists('product_details');
    }
}
