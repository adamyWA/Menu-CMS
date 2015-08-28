@extends('layouts.main')
@section('content')
		
		
			<div id="admin" class="col-md-12"><a href="/admin" class="btn btn-info">Go to Dashboard</a>
			{{ Session::get('message') }}
			</div>
		<div class="col-md-4"></div>
		<div id="main-page" class="col-md-4">
		
		{{ Form::open(
		array(
			'url'=>'admin/account/edit/email', 
			'method' => 'POST',
			'class'=>'item-form'
			)
		) }}
			{{ Form::label(
				'email', 'Email:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}
			{{ Form::text(
				'email', '', 
				array(
					'id'=>'',
					'placeholder'=>$email,
					'class'=>'item-name-edit  form-control'
					)
				) }}
				{{ $errors->first('email', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
				
				{{ Form::label(
				'confirm_email', 'Confirm your email address:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}	
				{{ Form::text(
				'confirm_email', '', 
				array(
					'placeholder'=>'Confirm email address',
					'id'=>'',
					'class'=>'item-name-edit  form-control'
					)
				) }}
				{{ $errors->first('confirm_email', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
			

		
					<div id="other-items" class="col-md-12">
				
			
			{{ Form::submit('Save', ['class' => "btn btn-success"]) }}
			{{ Form::close(); }}
			
	</div></div><div class="col-md-4"></div>
		 

	
@stop