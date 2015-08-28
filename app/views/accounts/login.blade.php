@extends('layouts.main')
@section('content')
	
			@if(isset($signout))
				{{ $signout }} 
			@endif

		{{ Session::get('message') }}	

	<div id="picture" class="col-md-6">
		<h2>Login to your account</h2>
	</div>
	<div id="description" class="col-md-6">
		{{ Form::open(
		array(
			'url'=>'admin',
			'method' => 'POST'
			)
		) }}
		{{ Form::label(
			'username', 'Username:',
			array(
			'id'=>'',
			'class'=>'label'
				)
			) }}
		{{ Form::text(
			'username', Input::get('username'), 
			array(
			'id'=>'',
			'class'=>'form-control'
				)
			) }}
			
			{{ $errors->first('username', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
			
		{{ Form::label(
			'password', 'Password:',
			array(
			'id'=>'',
			'class'=>'label'
				)
			) }}
		{{ Form::password(
			'password',
			array(
			'id'=>'',
			'class'=>'form-control'
				)
			) }}
			{{ $errors->first('password', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
			@if(isset($message))
				{{ $message }} 
			@endif
		
		{{ Form::submit('Login', array('class'=>'btn btn-info')) }}
		<a href="/remind" class="btn btn-default">Forgot Password</a>
		{{ Form::close() }}
		
	</div>
	

	{{ $admin = false}} 
@stop