<?php 
namespace Menu;
class DeleteMenuItem extends GetMenuItem{
public function deleteItemInfo($slug) {
	$results = \MenuItem::where('menu_item_slug', '=', $slug)->get();
	foreach($results as $result) {
		$id = $result->menu_item_id;
	}
	if(\Auth::check()) {
	\DB::beginTransaction();
			try {
					$statement = \MenuItem::find($id);
					$statement->delete();
			}
			catch( ValidationException $e)	{
				DB::rollback();
				throw $e;
				}
			\DB::commit();
	return \Redirect::to('admin')->withMessage('<div class="alert alert-dismissible alert-success alert-link"><button type="button" class="close" data-dismiss="alert">×</button>Item has been deleted</div>');
	}
	return \Redirect::to('admin');
}
public function getItemInfo($slug) {
	$results = \MenuItem::where('menu_item_slug', '=', $slug)->get();
	foreach($results as $result) {
		$id = $result->menu_item_id;
		$menu_item_name = $result->menu_item_name;
	}
return \View::make('menu-items.delete')->withSlug($slug)->withMenuItemName($menu_item_name);
}
}



?>