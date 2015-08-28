@extends('layouts.main')
@section('content')
			<div id="admin" class="col-md-12"><a href="/admin" class="pseudo-button btn btn-info">Back to dashboard</a>
		@if (isset($message))
			{{ $message }}
		@endif
		{{ Session::get('message') }}
		</div>
		
			
			<div id = "picture" class="col-md-6">
			{{ Form::open(
			array(
				'url'=>'admin/category/new',
				'files'=>true, 
				'method' => 'POST'
				)
			) }}
			<h3>Add a category (Think "Entree" or "Appetizer" or "Dessert")</h3>
			</div>
			<div id = "description" class="col-md-6">
			{{ Form::label(
				'name', 'Dish Type:',
				array(
					'id'=>'',
					'class'=>'label'
					)
				) }}
			{{ Form::text(
				'name', '', 
				array(
					'id'=>'',
					'class'=>'item-name-edit form-control'
					)
				) }}
		
				{{ $errors->first('name', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
			
						{{ Form::submit('Save', array('class'=>'btn btn-success')) }}
			{{ Form::close(); }}
			</div>
		
@stop