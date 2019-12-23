<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->string('customer_name');
            $table->string('customer_mail');
            $table->bigInteger('product_id');
            $table->string('product_name');
            $table->float('product_price', 5, 2);
            $table->timestamp('sale_date')->useCurrent();
            $table->string('version');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
