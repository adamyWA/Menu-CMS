<?php
namespace Menu;
class GetMenuItem {

		public function returnAllMenuInfo($slug) {
		
		
		$results = \MenuItem::where('menu_item_slug', '=', $slug )->get(array('menu_item_description', 'menu_item_picture_uri', 'menu_item_name', 'menu_item_slug', 'menu_item_id', 'menu_item_category_fk', 'menu_item_short', 'menu_item_price'));
		
		
			
		foreach ($results as $result) {
			$menu_item_description = $result->menu_item_description;
			$menu_item_name = $result->menu_item_name;
			$menu_item_picture_uri = $result->menu_item_picture_uri;
			$menu_item_id = $result->menu_item_id;
			$slug = $result->menu_item_slug;
			$menu_item_category_fk = $result->menu_item_category_fk;
			$menu_item_short = $result->menu_item_short;
			$menu_item_price = $result->menu_item_price;
		}	
		
		function getCategories() {

			$category = array();
			$categories = \MenuCategory::get();
			
			foreach($categories as $cat) {
			$cat_name = $cat->menu_category_name;
			$cat_id = $cat->menu_category_id;
			$category[$cat_id] = $cat_name;
			}
			return $category;
		}
		function getDefault($menu_item_category_fk) {
			$results = \MenuCategory::where('menu_category_id', '=', $menu_item_category_fk)->get(array('menu_category_id'));
			foreach($results as $result) {
			$category = $result->menu_category_id;
			}
			return $category;
		}
		
		$categories = getCategories();
		$default = "";
		if (isset($menu_item_category_fk)) {
		$default = getDefault($menu_item_category_fk);
		}
		
			if (\Auth::check()) {
				if(!isset($menu_item_description)){
				return \Redirect::to('admin');
				}
				return \View::make('menu-items.edit')->withMenuItemDescription($menu_item_description)->withMenuItemPictureUri($menu_item_picture_uri)->withMenuItemName($menu_item_name)->withMenuItemShort($menu_item_short)->withSlug($slug)->withCategories($categories)->withDefault($default)->withMenuItemPrice($menu_item_price);
			}
			return \Redirect::to('admin');
		}
}
?>