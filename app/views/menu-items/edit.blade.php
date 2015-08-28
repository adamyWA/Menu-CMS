@extends('layouts.main')
@section('content')
		
			<div id="admin" class="col-md-12"><a href="/admin" class="btn btn-info">Go to Dashboard</a>
			{{ Session::get('message') }}
			</div>

		<div id = "picture" class="col-md-6 center-pic">
			
				{{ HTML::image(
					$menu_item_picture_uri, 'food',
					array('class' => 'food'
					)
				) }}
			
					{{ Form::open(
		array(
			'url'=>'admin/edit/' . $slug,
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
					'id'=>'upload',
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
				'name', $menu_item_name, 
				array(
					'id'=>'',
					'class'=>'item-name-edit  form-control'
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
				'price', $menu_item_price, 
				array(
					'id'=>'',
					'class'=>'item-name-edit  form-control'
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
				'description', $menu_item_description,
				array(
					'id'=>'', 
					'class'=>'description-edit  form-control',
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
				'desc', $menu_item_short, 
				array(
					'id'=>'',
					'class'=>'description-edit  form-control',
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
					)
				) }}
			{{ Form::select('category', $categories, $default, ['class'=>'form-control']) }}
			{{ Form::submit('Save', ['class' => "btn btn-success"]) }}
			{{ Form::close(); }}
			<a href="/admin/edit/{{ $slug }}/delete" class="btn btn-primary">Delete this item</a>
	</div></div>
		 

	
@stop