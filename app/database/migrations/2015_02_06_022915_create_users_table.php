<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('users', function($table) {
		$table->increments('user_id');
		$table->string('username')->unique;
		$table->string('password');
		$table->string('email');
		$table->string('remember_token');
		$table->timestamps();
		});
		
		Schema::create('menu_categories', function($table) {
		$table->increments('menu_category_id');
		$table->string('menu_category_name');
		$table->string('menu_category_slug');
		$table->timestamps();
		});
		
		Schema::create('menu_items', function($table) {
		$table->increments('menu_item_id');
		$table->string('menu_item_name');
		$table->decimal('menu_item_price', 5, 2)->nullable();
		$table->text('menu_item_description');	
		$table->string('menu_item_slug')->unique;
		$table->string('menu_item_picture_uri')->default('/uploads/default.jpg');
		$table->integer('user_id_fk')->unsigned();	
		$table->string('menu_item_short');
		$table->integer('menu_item_category_fk')->unsigned();
		$table->foreign('menu_item_category_fk')->references('menu_category_id')->on('menu_categories');
		$table->foreign('user_id_fk')->references('user_id')->on('users');
		$table->timestamps();
		});
		
		Schema::create('restaurant_info', function($table) {
		$table->increments('restaurant_info_id');
		$table->string('restaurant_name');
		$table->string('restaurant_street_1');
		$table->string('restaurant_street_2')->nullable();
		$table->string('restaurant_phone');
		$table->string('restaurant_email');
		$table->integer('user_id_fk')->unsigned();
		$table->foreign('user_id_fk')->references('user_id')->on('users');
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
		Schema::dropIfExists('restaurant_info');
		Schema::dropIfExists('menu_items');
		Schema::dropIfExists('users');
		Schema::dropIfExists('menu_categories');
		
	}

}
