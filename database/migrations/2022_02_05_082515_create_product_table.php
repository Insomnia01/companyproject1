<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('product', function (Blueprint $table) {
        $table->id();
        $table->string('title',100);
        $table->integer('category_id')->nullable();
        $table->string('stock')->default("0");
        $table->string('status')->default("active");
        $table->timestamps();
        $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
      });
    } // şimdi kategorinin bir tane alt kategorisi oldu  
    // bir de üste erişmeye çalışalım, evet üste de eriştik. burada dikkat etmen gereken şu

    /**
    * Reverse the migrations.
    *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
