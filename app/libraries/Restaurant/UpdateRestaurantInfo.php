<?php
namespace Restaurant;

Class UpdateRestaurantInfo{
	public function updateRestaurantInfo() {
	$user = \Auth::user();
	$id = $user->user_id;
	$restaurant = \Restaurant::all();
	
		foreach($restaurant as $rest) {
			$restaurant_name = $rest->restaurant_name;
			$restaurant_street_1 = $rest->restaurant_street_1;
			$restaurant_street_2 = $rest->restaurant_street_2;
			$restaurant_phone = $rest->restaurant_phone;
			$restaurant_email = $rest->restaurant_email;
			$restaurant_id =$rest->restaurant_info_id;
		}
	\DB::beginTransaction();
			try {
					$statement = \Restaurant::find($restaurant_id);
					$statement->restaurant_name = \Input::get('name');
					$statement->restaurant_street_1 = \Input::get('address1');
					$statement->restaurant_street_2 = \Input::get('address2');
					$statement->restaurant_email = \Input::get('email');
					$statement->restaurant_phone = \Input::get('phone');
					$statement->user_id_fk = $id;
					$statement->save();
				}
				catch( ValidationException $e)	{
				DB::rollback();
				throw $e;
				}
			\DB::commit();
			return \Redirect::to('admin/account/edit/restaurant')->withRestaurantName($restaurant_name)
			->withRestaurantStreet_1($restaurant_street_1)
			->withRestaurantStreet_2($restaurant_street_2)
			->withRestaurantPhone($restaurant_phone)
			->withRestaurantEmail($restaurant_email)->with('message', '<p class="alert alert-dismissible alert-success alert-link">Saved!' . '</p>');
	}
	public function restaurantInfo() {
	$user = \Auth::user();
	$id = $user->user_id;
	$restaurant = \Restaurant::all();
	
		foreach($restaurant as $rest) {
			$restaurant_name = $rest->restaurant_name;
			$restaurant_street_1 = $rest->restaurant_street_1;
			$restaurant_street_2 = $rest->restaurant_street_2;
			$restaurant_phone = $rest->restaurant_phone;
			$restaurant_email = $rest->restaurant_email;
		}
	return \View::make('restaurant.edit')
			->withRestaurantName($restaurant_name)
			->withRestaurantStreet_1($restaurant_street_1)
			->withRestaurantStreet_2($restaurant_street_2)
			->withRestaurantPhone($restaurant_phone)
			->withRestaurantEmail($restaurant_email);	
	}
}


?>