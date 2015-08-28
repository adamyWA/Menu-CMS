<?php
namespace Menu;
Class Dashboard {

	public function dashBoard() {
		$menu_items = \MenuItem::all();
		$categories = \MenuCategory::all();
		if (\Auth::check()) {
			return \View::make('admin.dashboard')->with('menu_items', $menu_items)->with('categories', $categories);
			}
			return \View::make('accounts.login');

			}

}



?>