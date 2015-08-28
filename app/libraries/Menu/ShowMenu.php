<?php
namespace Menu;

class ShowMenu { 
		public function showMenu() {

			function getMenuItem() {
			$items = \MenuItem::get();

				foreach($items as $item) {

					$item_price[] = $item->menu_item_price;
					$item_desc[] = $item->menu_item_short;
					$item_name[] = $item->menu_item_name;
					$item_fk[] = $item->menu_item_category_fk;			
				}
				
				if(!isset($item)) {
				$items = null;
				return $items;
				}
				$items = array($item_name, $item_desc, $item_fk, $item_price);
				return $items;
			}
			function getCategories() {

			$categories = \MenuCategory::get();
			
			foreach($categories as $cat) {
			$cat_name[] = $cat->menu_category_name;
			$cat_id[] = $cat->menu_category_id;
			
			$category = array($cat_id, $cat_name);
			}
			return $category;
			}
			$items = getMenuItem();
			if($items === null) {
				return \Redirect::to('admin');
			}
			$category = getCategories();
			list($name, $desc, $fk, $price) = $items;
			list($cat_id, $cat) = $category;
			
			
			return \View::make('menu-items.menu')
			->withName($name)
			->withDesc($desc)
			->withFk($fk)
			->withPrice($price)
			->withCatId($cat_id)
			->withCatName($cat);
			}

}



/*
SELECT menu_item_name, menu_item_short, menu_item_price, menu_item_category_fk, menu_categories.menu_category_name, menu_categories.menu_category_id FROM menu_items JOIN menu_categories ON menu_item_category_fk = menu_categories.menu_category_id;
*/