@extends('layouts.main')
@section('content')
		
			<div id="admin" class="col-md-12"><a href="/admin" class="btn btn-info">Go to Dashboard</a>
			{{ Session::get('message') }}
			</div>
		<div class="col-md-4"></div>
		<div id="main-page" class="col-md-4">
		
		{{ Form::open(
		array(
			'url'=>'admin/account/edit/password', 
			'method' => 'POST',
			'class'=>'item-form'
			)
		) }}
			{{ Form::label(
				'password', 'New password:',
				array(
					'class'=>'label'
					)
				) }}
			{{ Form::password(
				'password', 
				array(
					'id'=>'',
					'class'=>'item-name-edit form-control'
					)
				) }}
				{{ $errors->first('password', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
				
				{{ Form::label(
				'confirm_password', 'Confirm password:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}	
				{{ Form::password(
				'confirm_password', 
				array(
					'id'=>'',
					'class'=>'item-name-edit form-control'
					)
				) }}
			
			{{ $errors->first('confirm_password', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
		
					<div id="other-items" class="col-md-12">
				
			
			{{ Form::submit('Save', ['class' => "btn btn-success"]) }}
			{{ Form::close(); }}
			
	</div></div><div class="col-md-4"></div>
		 

	
@stop