<?php
namespace Restaurant;

class Validate {

		public function Validate() {
			$message = array(
			'required' => 'Oops! Looks like you missed something.',
			'regex' => 'Please avoid the use of special characters.'
			);
		$validator = \Validator::make(

			array(
			'name' => \Input::get('name'),
			'address1' => \Input::get('address1'),
			'address2' => \Input::get('address2'),
			'phone' => \Input::get('phone'),
			'email' => \Input::get('email')
			),
			array(
			'name' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/', 'required'),
			'address1' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)\?]+$/', 'required'),
			'address2' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)\?]+$/', 'required'),
			'phone' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)\?]+$/', 'required', 'alpha_dash'),
			'email' => array('email', 'required')
			),
			$message
		);
		return $validator;
	}
	
?>