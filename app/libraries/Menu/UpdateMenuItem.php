<?php
namespace Menu;
Class UpdateMenuItem {
			

	public function updateMenuItem($slug) {
			

			
			$validate = new Validate;
			$validator = $validate->Validate();
			
			if (\Auth::check()) {
			
			$check = new CheckEditedItem;
			
			$slugcheck = $check->checkSlugMatch($slug);
			$namecheck = $check->checkNameMatch($slug);
			$idcheck = $check->checkIdMatch($slug);
			

			
			$results = \MenuItem::where('menu_item_slug', '=', $slug)->get(array('menu_item_description', 'menu_item_picture_uri', 'menu_item_name', 'menu_item_slug', 'menu_item_id', 'menu_item_short', 'menu_item_category_fk', 'menu_item_price'));
					
			foreach ($results as $result) {
				$menu_item_description = $result->menu_item_description;
				$menu_item_name = $result->menu_item_name;
				$menu_item_picture_uri = $result->menu_item_picture_uri;
				$slug = $result->menu_item_slug;
				$id = $result->menu_item_id;
				$menu_item_short = $result->menu_item_short;
				$menu_item_category_fk = $result->menu_item_category_fk;
				$menu_item_price = $result->menu_item_price;
			}
			
			if ($validator->fails()) {
			return \Redirect::back()->withErrors($validator);
			}

			
			
			
			if($idcheck === true) {
			\DB::beginTransaction();
			try {
					
					$slug = strtolower($slug);	
					$statement = \MenuItem::find($id);
					$statement->menu_item_description = \Input::get('description');
					if (\Input::hasFile('Upload')) {
						$name = \Input::file('Upload')->getClientOriginalName();
						\Input::file('Upload')->move('uploads', $name);
					$statement->menu_item_picture_uri = '/uploads/' . $name;	
					} 
					$statement->menu_item_short = \Input::get('desc');
					$statement->menu_item_price = \Input::get('price');
					$statement->menu_item_category_fk = \Input::get('category');
					$statement->save();
				}
				catch( ValidationException $e)	{
				DB::rollback();
				throw $e;
				}
			\DB::commit();
			
						return \Redirect::to('admin/edit/' . $slug)->with('message', '<div class="alert alert-dismissible alert-success alert-link"><button type="button" class="close" data-dismiss="alert">×</button>Saved at: ' . link_to('/menu/' . $slug) . '</p></div>');
			
			}
			
			
			if ($slugcheck === false || $namecheck === false) {
					
					$slug = \Input::get('name');
					$slug = preg_replace('#[ -]+#', '-', $slug);
					$slug = strtolower($slug);				
					
					$results = \MenuItem::where('menu_item_slug', '=', $slug)->get(array('menu_item_id'));
					
					foreach($results as $result) {
					$check_id = $result->menu_item_id;
					}
					
					if(isset($check_id)) {
					return \Redirect::back()->withErrors($validator)->withInput(array('name', 'description', 'category', 'desc', 'price'))->with('message', '<p class="alert alert-dismissible alert-danger alert-link">An item with the same name already exists');
					}
					
			\DB::beginTransaction();
			try {

					$statement = \MenuItem::find($id);
					$statement->menu_item_name = \Input::get('name');
					$statement->menu_item_description = \Input::get('description');
					if (\Input::hasFile('Upload')) {
						$name = \Input::file('Upload')->getClientOriginalName();
						\Input::file('Upload')->move('uploads', $name);
						$statement->menu_item_picture_uri = '/uploads/' . $name;
					}	
					$statement->menu_item_slug = $slug;
					$statement->menu_item_price = \Input::get('price');
					$statement->menu_item_short = \Input::get('desc');
					$statement->menu_item_category_fk = \Input::get('category');
					$statement->save();
				} 
				catch( ValidationException $e)	{
				DB::rollback();
				throw $e;
				}
				
			\DB::commit();
			  
 

			return \Redirect::to('admin/edit/' . $slug)->with('message', '<div class="alert alert-dismissible alert-success alert-link"><button type="button" class="close" data-dismiss="alert">×</button>Saved at: ' . link_to('/menu/' . $slug) . '</p></div>');
			}
			
			return \Redirect::to('admin/edit/' . $slug)->withErrors($validator)->withInput(array('name', 'description', 'category', 'desc', 'price'))->with('message', '<p class="alert alert-dismissible alert-danger alert-link">An item with the same name already exists');
			}
		}
		
}	
?>