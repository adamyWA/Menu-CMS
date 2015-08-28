<?php

namespace Menu;
Class CheckEditedItem {

	public function checkIdMatch($slug) {			
	
	$get_id = \MenuItem::where('menu_item_slug', '=', $slug)->get(array('menu_item_id'));
	foreach ($get_id as $get) {
		$id = $get->menu_item_id;
		} 
			
	//-----------
	$nameprep = \Input::get('name');
	$nameprep = preg_replace('#[ -]+#', '-', $nameprep);
	$nameprep = strtolower($nameprep);
	//------------
			
	$id_check = \MenuItem::where('menu_item_slug', '=', $nameprep)->get(array('menu_item_id'));
	foreach ($id_check as $get_id) {
	$id_check = $get_id->menu_item_id;
	}
	if($id_check === $id) {
	return true;
	}
	return false;
}
	public function checkSlugMatch($slug) {
		$get_slug = \MenuItem::where('menu_item_slug', '=', $slug)->get(array('menu_item_slug'))	;
		
		foreach($get_slug as $slug) {
			$slug = $slug->menu_item_slug;
		}
		//-----------
		$nameprep = \Input::get('name');
		$nameprep = preg_replace('#[ -]+#', '-', $nameprep);
		$nameprep = strtolower($nameprep);
		//------------
		
		$slug_check = \MenuItem::where('menu_item_slug', '=', $nameprep)->get(array('menu_item_slug'));
		
		foreach($slug_check as $get_slug) {
			$slug_check = $get_slug->menu_item_slug;
		}
		if($slug_check === $slug){
			return true;
		}
		return false;
	}
	public function checkNameMatch($slug) {
	$get_name = \MenuItem::where('menu_item_slug', '=', $slug)->get(array('menu_item_name'));
		
		foreach($get_name as $name) {
			$name = $name->menu_item_name;
		}
		//-----------
		$nameprep = \Input::get('name');
		$nameprep = preg_replace('#[ -]+#', '-', $nameprep);
		$nameprep = strtolower($nameprep);
		//------------
		
		$name_check = \MenuItem::where('menu_item_slug', '=', $nameprep)->get(array('menu_item_name'));
		
		foreach($name_check as $get_name) {
			$name_check = $get_name->menu_item_name;
		}
		$result = strcasecmp($name, $name_check);
		
		if($result === 0){
			return true;
		}
		return false;
	
	
	}
}	
?>