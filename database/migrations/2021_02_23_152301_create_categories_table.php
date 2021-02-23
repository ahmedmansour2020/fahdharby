<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('categories', function (Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('name_ar')->nullable();
$table->string('name_en')->nullable();
$table->longText('description_ar')->nullable();
$table->longText('description_en')->nullable();
$table->string('image')->nullable();
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::dropIfExists('categories');
	}
}
