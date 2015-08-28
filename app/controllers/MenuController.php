<?php
	
class MenuController extends \BaseController {
		
	/******
	Methods for handling routes 
	
	
	
	Takes the slug from a route and shows a single menu item - no need for auth
		Need to make an ACTUAL handler for empty result sets
	*******/
	public function showSingle($slug) 
	{
		$slugs = MenuItem::where('menu_item_slug', '=', $slug )->get();
		
		foreach ($slugs as $slug) {
			$slug = $slug->menu_item_id;
		};
			
		return View::make('menu-items.single-item')->withSlug($slug);	
	}
		
			
	/******
	
	Takes the slug from a GET route and shows a single menu item as editable 
	
	Need to add AUTH conditions
	
	*******/		
		
	public function editSingleGet($slug) {
		$menu_item = new Menu\GetMenuItem;
		$results = $menu_item->returnAllMenuInfo($slug);
		
		return $results;
	}
	
	
	/******
	
	Takes the slug from a POST route and updates MenuItem model after form input has been validated

		It then redirects to show the new item information with a confirmation message
	
	Need to add AUTH conditions
	
	*******/
	
	public function editSinglePost($slug) {
		$menu_item = new Menu\UpdateMenuItem;
		$update = $menu_item->updateMenuItem($slug);

		return $update;	
	}
	
	
	public function newItemPost() {
		$new = new Menu\NewMenuItem;
		$newItem = $new->newMenuItem();
		return $newItem;
		
	}
	public function newItemGet() {
		$category = new Menu\NewMenuItem;
		$categories = $category->getCategories();
		if (Auth::check()) {
		return View::make('menu-items.new')->withCategories($categories);
		}
		return Redirect::to('admin');
	}
	
	
	public function showMenu() {
		$show = new Menu\ShowMenu;
		$showall = $show->showMenu();
		
		return $showall;
	}
	
	public function deleteItemGet($slug) {
	$deleteItem = new Menu\DeleteMenuItem;
	$show = $deleteItem->getItemInfo($slug);
		if(!\Auth::check()){
		return Redirect::to('admin');
		}
	return $show;
	}
	public function deleteItemPost($slug) {
	$deleteItem = new Menu\DeleteMenuItem;
	$delete= $deleteItem->deleteItemInfo($slug);
	return $delete;
	}
}