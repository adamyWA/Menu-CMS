<?php

class AccountController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showLogin() {
	$dashboard_set = new Menu\Dashboard;
	$dashboard = $dashboard_set->dashBoard();
	return $dashboard;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function checkLogin()
	{
		$check = new User\CheckLogin;
		$attempt = $check->checkLogin();
		
		return $attempt;
	}

	public function logout()
	{	
		if (Auth::check()) {
		Auth::logout();
		return(View::make('accounts.login')->with('signout', '<div class="alert alert-dismissible alert-danger alert-link">
  <button type="button" class="close" data-dismiss="alert">×</button>
  You were successfully logged out.
</div>'));
		}
		return(View::make('accounts.login'));
	}

	public function remember() {
		$user = Auth::user();
		return $user->user_id;
	}
	
	public function editAccountGetEmail() {
	 $user = Auth::user();
	 $email = $user->email;
	 return (View::make('accounts.email')->withEmail($email));
	}
	public function editAccountPostEmail() {
		$change_email = new User\ChangeEmail;
		$change = $change_email->changeEmail();
		
		return $change;
	}
	
	public function editAccountGetPassword() {
		return (View::make('accounts.password'));
	}
	public function editAccountPostPassword() {
		$change_password = new User\ChangePassword;
		$change = $change_password->changePassword();
		
		return $change;
	}
	
}
