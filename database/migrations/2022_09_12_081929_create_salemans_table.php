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
        Schema::create('salemans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('salemans');
    }
};
