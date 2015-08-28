<?php 
namespace Menu;
class DeleteMenuCategory extends GetMenuItem{
public function deleteCategoryInfo($slug) {
	$results = \MenuCategory::where('menu_category_slug', '=', $slug)->get();
	foreach($results as $result) {
		$id = $result->menu_category_id;
	}
	$items_using_cat = \MenuItem::where('menu_item_category_fk', '=', $id)->get();
	foreach($items_using_cat as $item_using_cat) {
		if($item_using_cat) {
			return \Redirect::to("admin/category/edit/$slug")->with('message', '<div class="alert alert-dismissible alert-danger alert-link">Unable to delete category. Please make sure no items are using this category.</p></div>');
		};
	}
	//if an item exists that has this cat's fk, reload the page with an error
	if(\Auth::check()) {
	\DB::beginTransaction();
			try {
					$statement = \MenuCategory::find($id);
					$statement->delete();
			}
			catch( ValidationException $e)	{
				DB::rollback();
				throw $e;
				}
			\DB::commit();
	return \Redirect::to('admin')->with('message', '<div class="alert alert-dismissible alert-success alert-link">Category has been deleted</p></div>');
	}
	return \Redirect::to('admin');
}
public function getCategoryInfo($slug) {
	$results = \MenuCategory::where('menu_category_slug', '=', $slug)->get();
	foreach($results as $result) {
		$id = $result->menu_category_id;
		$menu_category_name = $result->menu_category_name;
	}
return \View::make('categories.delete')->withSlug($slug)->withMenuCategoryName($menu_category_name);
}

}



?>