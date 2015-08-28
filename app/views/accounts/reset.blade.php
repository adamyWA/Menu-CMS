@extends('layouts.main')
@section('content')
<div id="admin" class="col-md-12">
	@if (Session::has('error'))
			<p class="alert alert-dismissible alert-danger alert-link">{{ Session::get('error') }}</p>
	@endif
	
	@if (Session::has('status'))
			<p class="alert alert-dismissible alert-success alert-link">{{ Session::get('status') }}</p>
	@endif	
</div>
<div id="picture" class="col-md-6">
<h2>Please update your password</h2>
</div>
<div id="description" class="col-md-6">
<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
	<label class="label" for="email">Enter your email address:</label>
    <input type="email" name="email"  class="form-control">
	<label class="label" for="email">New password:</label>
    <input type="password" name="password"  class="form-control">
	<label class="label" for="email">Confirm password:</label>
    <input type="password" name="password_confirmation" class="form-control">
    <input type="submit" value="Reset Password" class="btn btn-info">
</form>
</div>

@stop