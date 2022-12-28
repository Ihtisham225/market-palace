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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('company_id')->constrained('companies')->nullable(); //for medical products
            $table->foreignId('brand_id')->constrained('brands')->nullable();
            
            //for strings companies
            $table->string('number')->nullable();

            //for laptops and accessories
            $table->string('model')->nullable();
            $table->string('ram')->nullable();
            $table->string('ssd')->nullable();
            $table->string('hdd')->nullable();
            $table->string('generation')->nullable();
            $table->string('processor')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable(); //screen size, i.e. 13 inch, 15 inch etc
            $table->string('resolution')->nullable();
            $table->string('graphics')->nullable();
            $table->tinyInteger('bluetooth')->nullable(); // Device forexample keyboard mouse. 1. is bluetooth, 2. no bluetooth, 3. both
            
            //for mobiles :model, color, ram, processor is same as laptops
            $table->string('storage')->nullable();
            $table->boolean('sim')->nullable(); // 0:single, 1:double
            $table->string('imei1')->nullable();
            $table->string('imei2')->nullable();
            $table->boolean('fingerprint')->nullable();
            $table->boolean('faceid')->nullable();

            //for whole sale dealers
            $table->string('packing')->nullable();
            $table->string('retail_price')->nullable();
            $table->string('trade_price')->nullable(); //retail_price - 15%

            $table->string('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('stock_alert')->nullable();
            $table->double('purchase_price', 255, 2)->nullable();
            $table->double('sale_price', 255, 2);

            //registerd customer and dealer
            $table->foreignId('customer_id')->constrained('customers')->nullable();
            $table->foreignId('dealer_id')->constrained('dealers')->nullable();

            //walkin customer or seller
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();

            $table->string('seller_name')->nullable();
            $table->string('seller_phone')->nullable();
            
            $table->tinyInteger('status')->default('1');
            $table->timestamp('return_date');
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
        Schema::dropIfExists('products');
    }
};
