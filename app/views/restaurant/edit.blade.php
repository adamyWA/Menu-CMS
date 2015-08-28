@extends('layouts.main')
@section('content')
		
			<div id="admin" class="col-md-12"><a href="/admin" class="btn btn-info">Go to Dashboard</a>
			{{ Session::get('message') }}
			</div>
		<div class="col-md-4"></div>
		<div id="main-page" class="col-md-4">
		
		{{ Form::open(
		array(
			'url'=>'admin/account/edit/restaurant', 
			'method' => 'POST',
			'class'=>'item-form'
			)
		) }}
			{{ Form::label(
				'name', 'Restaurant name:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}
			{{ Form::text(
				'name', $restaurant_name, 
				array(
					'id'=>'',
					'class'=>'item-name-edit  form-control'
					)
				) }}
				{{ $errors->first('name', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
				
				{{ Form::label(
				'address1', 'Street Address:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}	
				{{ Form::text(
				'address1', $restaurant_street_1, 
				array(
					'id'=>'',
					'class'=>'item-name-edit  form-control'
					)
				) }}
				{{ $errors->first('address1', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
				
				{{ Form::label(
				'address2', 'Street Address 2:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}	
				{{ Form::text(
				'address2', $restaurant_street_2, 
				array(
					'id'=>'',
					'class'=>'item-name-edit  form-control'
					)
				) }}
				{{ $errors->first('address2', '<p class="alert alert-dismissible alert-danger">:message</p>') }}			

				{{ Form::label(
				'phone', 'Phone:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}	
				{{ Form::text(
				'phone', $restaurant_phone, 
				array(
					'id'=>'',
					'class'=>'item-name-edit  form-control'
					)
				) }}
				{{ $errors->first('phone', '<p class="alert alert-dismissible alert-danger">:message</p>') }}			
				
				
				{{ Form::label(
				'email', 'Email:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}	
				{{ Form::email(
				'email', $restaurant_email, 
				array(
					'id'=>'',
					'class'=>'item-name-edit  form-control'
					)
				) }}
				{{ $errors->first('email', '<p class="alert alert-dismissible alert-danger">:message</p>') }}					
					<div id="other-items" class="col-md-12">
				
			
			{{ Form::submit('Save', ['class' => "btn btn-success"]) }}
			{{ Form::close(); }}
			
	</div></div><div class="col-md-4"></div>
		 

	
@stop