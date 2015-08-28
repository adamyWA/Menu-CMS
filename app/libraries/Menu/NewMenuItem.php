<?php
namespace Menu;

Class NewMenuItem extends GetMenuItem {

		public function getCategories() {

			$category = array();
			$categories = \MenuCategory::get();
			
			foreach($categories as $cat) {
			$cat_name = $cat->menu_category_name;
			$cat_id = $cat->menu_category_id;
			$category[$cat_id] = $cat_name;
			}
			return $category;
		}
	public function nameToSlug($validated) {
		$slug = \Input::get('name');
		$slug = preg_replace('#[ -]+#', '-', $slug);
		$slug = strtolower($slug);
		$results = \MenuItem::where('menu_item_slug', '=', $slug )->get(array('menu_item_slug', 'menu_item_id'));
		$slug_check = "";
		foreach ($results as $result) {
		$slug_check = $result->menu_item_slug;
		}
		if ($slug_check !== $slug) {
		return true;
		}
		return false;
		
	}
	public function newMenuItem() {
		$validate = new Validate;
		$validated = $validate->Validate();
		$categories = $this->getCategories();	
		$nameToSlug = $this->nameToSlug($validated);
		$current_user = \Auth::user()->user_id;
				if (\Auth::check()) {			
					if ($validated->passes() && $nameToSlug === true) {
					$slug = \Input::get('name');
					$slug = preg_replace('#[ -]+#', '-', $slug);
					$slug = strtolower($slug);
					\DB::beginTransaction();
					try {
						$item = new \MenuItem;
						$item->menu_item_name = \Input::get('name');
						$item->menu_item_description = \Input::get('description');
						$item->menu_item_category_fk = \Input::get('category');
						$item->menu_item_short = \Input::get('desc');
						$item->menu_item_price = \Input::get('price');
						$item->menu_item_slug = $slug;
						if (\Input::hasFile('Upload')) {
							$name = \Input::file('Upload')->getClientOriginalName();
							\Input::file('Upload')->move('uploads', $name);
							$item->menu_item_picture_uri = '/uploads/' . $name;
						}
						//this creates the menu item for user1...they're fucked if it doesnt //exist
						
						
						$item->user_id_fk = $current_user;
						$item->save();
					} 
					catch( ValidationException $e)	{
					DB::rollback();
					throw $e;
					}
				\DB::commit();
				
				return \Redirect::to('admin/edit/' . $slug)->with('message', '<div class="alert alert-dismissible alert-success alert-link"><button type="button" class="close" data-dismiss="alert">×</button>Saved at: ' . link_to('/menu/' . $slug) . '</p></div>');
				
			}
			if ($nameToSlug === false) {
			return \View::make('menu-items.new')->withErrors($validated)->withInput(array('name', 'description'))->with('message', '<p class="alert alert-dismissible alert-danger alert-link">An item with the same name already exists')->withCategories($categories);
			}
			
			return \View::make('menu-items.new')->withErrors($validated)->withInput(array('name', 'description', 'category', 'desc', 'price'))->withCategories($categories);
			
			}	
			return \Redirect::to('admin');
		}
}





?>
