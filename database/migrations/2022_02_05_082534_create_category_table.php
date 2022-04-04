<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('category', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('title');
        $table->string('status')->default('active');
        $table->integer('parent_id')->nullable();  // bu parent id modelda belirtilmeli
        $table->timestamps();
        $table->foreign('parent_id')->references('id')->on('category')->onDelete('cascade');
      });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}