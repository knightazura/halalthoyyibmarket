<?php

use Sindria\Helpers\Migrations\ZeroMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryPivotsTable extends ZeroMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->getConnection())->create('product_category_pivots', function (Blueprint $table) {
            $table->integer('category_id');
            $table->uuid('product_id');
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
        Schema::connection($this->getConnection())->dropIfExists('product_category_pivots');
    }
}
