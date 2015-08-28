@extends('layouts.main')
@section('content')
				<div id="admin" class="col-md-12"><a href="/admin" class="btn btn-info">Go to Dashboard</a>
				@if (isset($message))
					{{ $message }}
				@endif
				{{ Session::get('message') }}</div>
				
		

			
			<div id = "picture" class="col-md-6">
			<h3>Edit/delete this category</h3>
			{{ Form::open(
			array(
				'url'=>'admin/category/edit/' . $slug,
				'method' => 'POST'
				)
			) }}
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
				'name', $menu_category_name, 
				array(
					'id'=>'',
					'class'=>'item-name-edit form-control' 
					)
				) }}
			
				{{ $errors->first('name', '<p class="alert alert-dismissible alert-danger">:message</p>') }}
						{{ Form::submit('Save', ['class'=>'btn btn-success']) }}
			{{ Form::close(); }}
			<a href="/admin/category/edit/{{ $slug }}/delete" class="btn btn-primary">Delete this category</a>
			</div>
		
		
@stop