<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('product_id');
            $table->string('quantity');
            $table->string('amount');
            $table->string('sub_total');
            $table->integer('discount');
            $table->integer('bonus');
            $table->integer('tax');
            $table->boolean('percentage');
            $table->double('total', 255, 2);
            $table->string('pay');
            $table->string('due');
            $table->double('profit', 255, 2);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
