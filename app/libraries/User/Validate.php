<?php 
namespace User;

Class Validate {
	
	public function validateCreds() {
	$validator = \Validator::make(
			array(
			'username' => \Input::get('username'),
			'password' => \Input::get('password')
			),
			array(
			'username' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/', 'Required'),
			'password' => array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/', 'Required')
			)
		);
		return $validator;
	}
	public function validateNewPassword() {
	$message = array(
			'required' => 'Oops! Looks like you missed something.',
			'regex' => 'Please avoid the use of special characters.',
			'same' => 'Password fields do not match'
			);
	$validator = \Validator::make(
			array(
			'password' => \Input::get('password'),
			'confirm_password' => \Input::get('confirm_password')
			),
			array(
			'password'=> array('Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/', 'Required'),
			'confirm_password'=> array('Required', 'Same:password')
			),
			$message
		);
		return $validator;
	}
public function validateNewEmail() {
	$message = array(
			'required' => 'Oops! Looks like you missed something.',
			'email' => 'Invalid email address supplied.',
			'same' => 'Email addresses do not match'
			);
	$validator = \Validator::make(
			array(
			'email' => \Input::get('email'),
			'confirm_email' => \Input::get('confirm_email')
			),
			array(
			'email'=> array('email', 'Required'),
			'confirm_email'=> array('Required', 'Same:email')
			),
			$message
		);
		return $validator;
	}
}



?>