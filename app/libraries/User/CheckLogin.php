<?php
namespace User;

class CheckLogin {

	public function checkLogin() {
		$username = \Input::get('username');
		$password = \Input::get('password');	
		$validator = new Validate;
		$validated = $validator->validateCreds();
		$attempt = \Auth::attempt(array('username' => $username, 'password' => $password));
		$menu_items = \MenuItem::all();
		$categories = \MenuCategory::all();
		
		if ($validated->passes()) {
			
			if (!\Auth::validate(array('username' => $username, 'password' => $password))){
				return \View::make('accounts.login')->withErrors($validated)->withInput(\Input::only('username'))->with('message', '<p class="alert alert-dismissible alert-danger">Invalid username or password</p>');
			}
			
			if ($attempt === true) {
				return \View::make('admin.dashboard')->with('menu_items', $menu_items)->with('categories', $categories);
			}
		}
		return \View::make('accounts.login')->withErrors($validated)->withInput(\Input::only('username'));
	}
}	





?>