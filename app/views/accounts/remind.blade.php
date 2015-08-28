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
<h2>Forgot your password?</h2>
</div>
<div id="description" class="col-md-6">
<form action="{{ action('RemindersController@postRemind') }}" method="POST">
	<label class="label" for="email">Enter your email address:</label>
	<input type="email" name="email" class="form-control">
    <input type="submit" value="Send Reminder" class="btn btn-info">
</form>
</div>

@stop