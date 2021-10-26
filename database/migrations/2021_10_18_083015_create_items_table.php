<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('customer_id');
            $table->foreignId('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('name');
            $table->double('total_amount');
            $table->double('installment_amount');
            $table->date('date_of_payment');
            $table->string('note');
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
        Schema::dropIfExists('items');
    }
}
