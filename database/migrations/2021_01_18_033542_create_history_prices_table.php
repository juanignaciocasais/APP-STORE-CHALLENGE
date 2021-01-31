<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_prices', function (Blueprint $table) {
            $table->integer('price_id',true);
            $table->double('last_price');
            $table->integer('app_id');
            $table->timestamps();
            $table->foreign('app_id')->references('app_id')->on('apps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_prices');
    }
}
