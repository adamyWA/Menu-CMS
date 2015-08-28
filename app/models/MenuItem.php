<?php

class MenuItem extends Eloquent {

    protected $table = 'menu_items';
	public $primaryKey ='menu_item_id';
	protected $fillable = array('menu_item_name', 'menu_item_description', 'menu_item_slug', 'menu_item_picture_uri', 'user_id_fk');
	
	public function user() {
	
	return $this->belongsTo('User', 'user_id_fk');
	
	}
	
	public function category() {
	
	return $this->hasOne('MenuCategory', 'menu_category_id');
	
	}
	
}
?>