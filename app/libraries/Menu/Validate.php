<?php

namespace Menu;

class Validate {

		public function Validate() {
			$message = array(
			'required' => 'Oops! Looks like you missed something.',
			'regex' => 'Please avoid the use of special characters.'
			);
		$validator = \Validator::make(

			array(
			'name' => \Input::get('name'),
			'Upload' => \Input::file('Upload'),
			'description' => \Input::get('description'),
			'desc' => \Input::get('desc'),
			'category' => \Input::get('category'),
			'price' => \Input::get('price')
			),
			array(
			'name' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/', 'required'),
			'Upload' => 'image|max:2048',
			'description' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)\?]+$/', 'required'),
			'desc' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)\?]+$/', 'required'),
			'category' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)\?]+$/', 'required'),
			'price' => array('numeric','required')
			),
			$message
		);
		return $validator;
	}
	
	public function Validate_New() {
		$message = array(
			'required' => 'Oops! Looks like you missed something.',
			'regex' => 'Please avoid the use of special characters.'
			);
			
		$validator = \Validator::make(
			array(
			'name' => \Input::get('name'),
			'Upload' => \Input::file('Upload'),
			'description' => \Input::get('description'),
			'slug' => \Input::get('slug'),
			'desc' => \Input::get('desc'),
			'category' => \Input::get('category'),
			'price' => \Input::get('price')
			),
			array(
			'name' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/\.:\(\)]+$/', 'unique:menu_items,menu_item_name'),
			'Upload' => 'image|max:2048',
			'description' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)\?]+$/'),
			'slug' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/', 'unique:menu_items,menu_item_slug'),
			'desc' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)\?]+$/', 'required'),
			'category' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)\?]+$/', 'required'),
			'price' => array('numeric','required')
			),
			$message
		);
		return $validator;
	}
	public function Validate_Category() {

		$message = array(
			'required' => 'Oops! Looks like you didn\'t provide a Category name.',
			'regex' => 'Please avoid the use of special characters.'
			);
	
		$validator = \Validator::make(
			array(
			'name' => \Input::get('name'),
			),
			array(
			'name' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/\.:\(\)]+$/', 'required'
			)), 
			$message
		);
		return $validator;
	}
	
}
		
?>