<?php
namespace User;

Class ChangePassword{

	function changePassword() {
		$validator = new Validate;
		$validated = $validator->validateNewPassword();

		if ($validated->fails()) {
			return \View::make('accounts.password')->withErrors($validated);
		}
		if (\Auth::check()) {
		
			$hashed = \Hash::make(\Input::get('password'));
			$id = \Auth::user()->user_id;
			
			\DB::beginTransaction();
				try {

					$statement = \User::find($id);
					$statement->password = $hashed;
					$statement->save();
				} 
					catch( ValidationException $e)	{
					DB::rollback();
					throw $e;
				}
				\DB::commit();
				\Auth::logout();
				return \Redirect::to('admin/logout')->with('message', '<div class="alert alert-dismissible alert-success alert-link">
				<button type="button" class="close" data-dismiss="alert">×</button>
				Password changed. Please log in.
				</div>');
				
		}
		return \Redirect::to('admin')->with('message', '<div class="alert alert-dismissible alert-success alert-link">
		<button type="button" class="close" data-dismiss="alert">×</button>
		Password changed. Please log in.
		</div>');
	}
}

?>