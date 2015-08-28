<?php

class CategoryController extends \BaseController {
	public function showCategory($slug) {
	$showCategory = new Menu\EditCategory;
	$show = $showCategory->showMenuCategory($slug);
	return $show;
	}
	public function editCategory($slug) {
	$editCategory = new Menu\EditCategory;
	$edit = $editCategory->updateMenuCategory($slug);
	return $edit;
	}
	public function addCategoryGet() {
	return View::make('categories.new');
	}
	public function addCategoryPost() {
	$newCategory = new Menu\AddCategory;
	$new = $newCategory->newCategory();
	return $new;
	}
	public function deleteCategoryGet($slug) {
	$deleteCategory = new Menu\DeleteMenuCategory;
	$show = $deleteCategory->getCategoryInfo($slug);
	if(!\Auth::check()){
		return Redirect::to('admin');
	}
	return $show;
	}
	public function deleteCategoryPost($slug) {
	$deleteCategory = new Menu\DeleteMenuCategory;
	$delete= $deleteCategory->deleteCategoryInfo($slug);
	return $delete;
	}
}


?>