<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOffersTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('product_offers', function (Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->foreignId('product_id')->nullable()->constrained('products');
$table->float('offer',10,8)->nullable();
$table->date('start')->nullable();
$table->date('end')->nullable();
$table->integer('status')->default(0);
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::dropIfExists('product_offers');
	}
}
