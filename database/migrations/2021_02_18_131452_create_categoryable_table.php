<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryableTable extends Migration
{
    /**
     * Миграция для полиморфной связи.
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryables', function (Blueprint $table) {
            $table->integer('category_id');      //id категории
            $table->integer('categoryable_id');  //id любой модели с этой категорией (новости, продукты итд.)
            $table->string('categoryable_type'); //и тип этой модели
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoryables');
    }
}
