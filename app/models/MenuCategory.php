<?php

class MenuCategory extends Eloquent {

    protected $table = 'menu_categories';
	public $primaryKey ='menu_category_id';
	protected $fillable = array('menu_category');
	
	public function menuItem() {
	
	return $this->belongsTo('MenuItem', 'menu_item_id');
	
	}
	
}