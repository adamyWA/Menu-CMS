<?php
namespace User;

Class ChangeEmail{
function changeEmail() {
		$validator = new Validate;
		$validated = $validator->validateNewEmail();
		$user = \Auth::user();
		$email = $user->email;
		
		if ($validated->fails()) {
			return \View::make('accounts.email')->withErrors($validated)->withEmail($email);
		}
		if (\Auth::check()) {
		
			$id = \Auth::user()->user_id;
			
			\DB::beginTransaction();
				try {

					$statement = \User::find($id);
					$statement->email = \Input::get('email');
					$statement->save();
				} 
					catch( ValidationException $e)	{
					DB::rollback();
					throw $e;
				}
				\DB::commit();
				
				return \Redirect::to('admin/account/edit/email')->with('message', '<p class="alert alert-dismissible alert-success alert-link">Email address updated.	
				</p>')->withEmail($email);
				
		}
		return \Redirect::to('admin/account/edit/email')->with('message', '<p class="alert alert-dismissible alert-success alert-link">Email address updated.
				</p>')->withEmail($email);
	}
}

?>