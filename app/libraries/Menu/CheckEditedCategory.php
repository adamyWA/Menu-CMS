<?php 
namespace Menu;
class CheckEditedCategory{

public function checkIdMatch($slug) {			
	
	$get_id = \MenuCategory::where('menu_category_slug', '=', $slug)->get(array('menu_category_id'));
	foreach ($get_id as $get) {
		$id = $get->menu_category_id;
		} 
			
	//-----------
	$nameprep = \Input::get('name');
	$nameprep = preg_replace('#[ -]+#', '-', $nameprep);
	$nameprep = strtolower($nameprep);
	//------------
			
	$id_check = \MenuCategory::where('menu_category_slug', '=', $nameprep)->get(array('menu_category_id'));
	foreach ($id_check as $get_id) {
	$id_check = $get_id->menu_category_id;
	}
	if($id_check === $id) {
	return true;
	}
	return false;
}
	public function checkSlugMatch($slug) {
		$get_slug = \MenuCategory::where('menu_category_slug', '=', $slug)->get(array('menu_category_slug'))	;
		
		foreach($get_slug as $slug) {
			$slug = $slug->menu_category_slug;
		}
		//-----------
		$nameprep = \Input::get('name');
		$nameprep = preg_replace('#[ -]+#', '-', $nameprep);
		$nameprep = strtolower($nameprep);
		//------------
		
		$slug_check = \MenuCategory::where('menu_category_slug', '=', $nameprep)->get(array('menu_category_slug'));
		
		foreach($slug_check as $get_slug) {
			$slug_check = $get_slug->menu_category_slug;
		}
		if($slug_check === $slug){
			return true;
		}
		return false;
	}
	public function checkNameMatch($slug) {
	$get_name = \MenuCategory::where('menu_category_slug', '=', $slug)->get(array('menu_category_name'));
		
		foreach($get_name as $name) {
			$name = $name->menu_category_name;
		}
		//-----------
		$nameprep = \Input::get('name');
		$nameprep = preg_replace('#[ -]+#', '-', $nameprep);
		$nameprep = strtolower($nameprep);
		//------------
		
		$name_check = \MenuCategory::where('menu_category_slug', '=', $nameprep)->get(array('menu_category_name'));
		
		foreach($name_check as $get_name) {
			$name_check = $get_name->menu_category_name;
		}
		$result = strcasecmp($name, $name_check);
		
		if($result === 0){
			return true;
		}
		return false;
	
	
	}

} 

?>