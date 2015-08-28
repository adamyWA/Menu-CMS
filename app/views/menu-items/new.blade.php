@extends('layouts.main')
@section('content')
		
					<div id="admin" class="col-md-12"><div id="admin" class="col-md-12"><a href="/admin" class="btn btn-info">Go to dashboard</a>
		@if (isset($message))
			{{ $message }}
		@endif
		</div>
	
		{{ Session::get('message') }}
		

		<div id = "picture" class="col-md-6">

			{{ Form::open(
		array(
			'url'=>'admin/new',
			'files'=>true, 
			'method' => 'POST',
			'class'=>'item-form'
			)
		) }}
			{{ $errors->first('Upload', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
			{{ Form::label(
				'upload','',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}
			{{ Form::file(
				'Upload','',
				array(
					'id'=>'',
					'class'=>'upload'
					)
				) }}

		</div>
		<div id = "description" class="col-md-6">
			{{ Form::label(
				'name', 'Name:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}
			{{ Form::text(
				'name', Input::get('name'), 
				array(
					'id'=>'',
					'class'=>'item-name-edit form-control'
					)
				) }}
			
				{{ $errors->first('name', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
			{{ Form::label(
				'price', 'Price:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}
			{{ Form::text(
				'price', Input::get('price'), 
				array(
					'id'=>'',
					'class'=>'item-name-edit form-control'
					)
				) }}
		
			{{ $errors->first('price', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
			{{ Form::label(
				'description', 'Description - Displayed when viewing menu item:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}
		
			{{ Form::textArea(
				'description', Input::get('description'),
				array(
					'id'=>'', 
					'class'=>'description-edit form-control',
					'rows'=>5
					)
				) }}
			
			{{ $errors->first('description', '<p class="alert alert-dismissible alert-danger">:message</p>') }}	
			
			{{ Form::label(
				'description', 'Short description - Displayed when viewing the menu:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}
		
			{{ Form::textarea(
				'desc', Input::get('desc'), 
				array(
					'id'=>'',
					'class'=>'description-edit form-control',
					'rows'=>3
					)
				) }}
				
			{{ $errors->first('desc', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
		<div id="other-items" class="col-md-12">
		{{ Form::label(
			'category', 'Select a category:',
			array(
				'id'=>'',
				'class'=>'label'
				)) }}
		{{ Form::select('category', $categories, null, ['class'=>'form-control']) }}
		{{ Form::submit('Save', ['class' => "btn btn-success"]) }}
		{{ Form::close() }}
		</div>
		</div>
</div>


		{{$admin = false}}
	
@stop
