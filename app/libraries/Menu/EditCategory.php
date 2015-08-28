<?php
namespace Menu;
class EditCategory extends GetMenuItem{

public function updateMenuCategory($slug) {
			

			
			$validate = new Validate;
			$validator = $validate->Validate_Category();
			
			if (\Auth::check()) {
			
			$check = new CheckEditedCategory;
			
			$slugcheck = $check->checkSlugMatch($slug);
			$namecheck = $check->checkNameMatch($slug);
			$idcheck = $check->checkIdMatch($slug);
			

			
			$results = \MenuCategory::where('menu_category_slug', '=', $slug)->get(array('menu_category_slug', 'menu_category_name', 'menu_category_id'));
					
			foreach ($results as $result) {
				$menu_category_name = $result->menu_category_name;
				$slug = $result->menu_category_slug;
				$id = $result->menu_category_id;
			}
			
			if ($validator->fails()) {
			return \Redirect::back()->withErrors($validator);
			}

			
			
			
			if($idcheck === true) {
			\DB::beginTransaction();
			try {
					
					$slug = strtolower($slug);	
					$statement = \MenuCategory::find($id);
					$statement->save();
				}
				catch( ValidationException $e)	{
				DB::rollback();
				throw $e;
				}
			\DB::commit();
			
			return \Redirect::to('admin/category/edit/' . $slug)->with('message', '<p class="alert alert-dismissible alert-success alert-link">Saved!' . '</p>');
			}
			
			
			if ($slugcheck === false || $namecheck === false) {
					
					$slug = \Input::get('name');
					$slug = preg_replace('#[ -]+#', '-', $slug);
					$slug = strtolower($slug);				
					
					$results = \MenuCategory::where('menu_category_slug', '=', $slug)->get(array('menu_category_id'));
					
					foreach($results as $result) {
					$check_id = $result->menu_category_id;
					}
					
					if(isset($check_id)) {
					return \Redirect::back()->withErrors($validator)->withInput(array('name'))->with('message', '<p class="alert alert-dismissible alert-danger alert-link">A category with the same name already exists');
					}
					
				\DB::beginTransaction();
				try {

					$statement = \MenuCategory::find($id);
					$statement->menu_category_name = \Input::get('name');
					$statement->menu_category_slug = $slug;
					$statement->save();
				} 
					catch( ValidationException $e)	{
					DB::rollback();
					throw $e;
				}
				
				\DB::commit();
			
				return \Redirect::to('admin/category/edit/' . $slug)->with('message', '<p class="alert alert-dismissible alert-success alert-link">Saved!' . '</p>');
				}
			
				return \Redirect::to('admin/category/edit' . $slug)->withErrors($validator)->withInput(array('name'))->with('message', '<p class="alert alert-dismissible alert-danger alert-link">A category with the same name already exists');
				}
			}
			public function showMenuCategory($slug) {
			$result = \MenuCategory::where('menu_category_slug', '=', $slug)->first();
			$menu_category_name = $result->menu_category_name;
	
			return \View::make('categories.edit')->withMenuCategoryName($menu_category_name)->withSlug($slug);
			}
}

?>