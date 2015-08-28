<?php 

class RestaurantController extends Controller {

	public function editRestaurantGet() {
		if (Auth::check()) {
		$restaurant_info = new Restaurant\UpdateRestaurantInfo;
		$restaurant = $restaurant_info->restaurantInfo();
			return $restaurant;
		}
		return Redirect::to('admin');
	}
	public function editRestaurantPost() {
		if (Auth::check()) {
		$restaurant_info = new Restaurant\UpdateRestaurantInfo;
		$restaurant = $restaurant_info->updateRestaurantInfo();
			return $restaurant;
		}
		return Redirect::to('admin');
	}

}

?>