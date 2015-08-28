<?php
namespace Menu;
class AddCategory extends GetMenuItem{

public function nameToSlug($validated) {
		$slug = \Input::get('name');
		$slug = preg_replace('#[ -]+#', '-', $slug);
		$slug = strtolower($slug);
		$results = \MenuCategory::where('menu_category_slug', '=', $slug )->get(array('menu_category_slug', 'menu_category_name'));
		$slug_check = "";
		foreach ($results as $result) {
		$slug_check = $result->menu_category_slug;
		}
		if ($slug_check !== $slug) {
		return true;
		}
		return false;
		
	}
	public function newCategory() {
		$validate = new Validate;
		$validated = $validate->Validate_Category();

		$nameToSlug = $this->nameToSlug($validated);
				if (\Auth::check()) {			
					if ($validated->passes() && $nameToSlug === true) {
					$slug = \Input::get('name');
					$slug = preg_replace('#[ -]+#', '-', $slug);
					$slug = strtolower($slug);
					\DB::beginTransaction();
					try {
						$item = new \MenuCategory;
						$item->menu_category_name = \Input::get('name');
						$item->menu_category_slug = $slug;
						$item->save();
					} 
					catch( ValidationException $e)	{
					DB::rollback();
					throw $e;
					}
				\DB::commit();
				
				return \Redirect::to('admin/category/edit/' . $slug)->with('message', '<div class="alert alert-dismissible alert-success alert-link"><button type="button" class="close" data-dismiss="alert">×</button>Saved!</p></div>');
				
			}
			if ($nameToSlug === false) {
			return \View::make('categories.new')->withErrors($validated)->withInput(array('name'))->with('message', '<p class="alert alert-dismissible alert-danger alert-link">That category already exists!');
			}
			return \View::make('categories.new')->withErrors($validated)->withInput(array('name'));
			
			}	
			return \Redirect::to('admin');
		}

}
?>