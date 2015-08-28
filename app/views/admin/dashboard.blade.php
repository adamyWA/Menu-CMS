@extends('layouts.main')
@section('content')


		@if (isset($message))
			{{ $message }}
		@endif
		{{ Session::get('message') }}	
	<div id = "main-page" class="col-md-6">
		<h2>Edit items</h2>
		<hr>
		@if(isset($menu_items))
			<ul  class="edit">
		
			@foreach($menu_items as $item)

				<li class="edit-link">
				{{ link_to('admin/edit/' . $item->menu_item_slug, $item->menu_item_name, ['class' => 'link']) }}</li>
			
			@endforeach
			</ul>
			<p class="centered-button">{{ link_to('admin/new/', 'Add new item', array('class'=>'btn btn-default')) }}</p>
		@endif
		<h2>Edit Categories</h2>
		<hr>
	@if(isset($categories))
			<ul class="edit">
		
			@foreach($categories as $category)

				<li class="edit-link">
				{{ link_to('admin/category/edit/' . $category->menu_category_slug, $category->menu_category_name, ['class' => '']) }}</li>
			
			@endforeach
			
			</ul>
			<p class="centered-button">{{ link_to('admin/category/new', 'Add new category', array('class'=>'btn btn-default')) }}</p>
		@endif
	</div>
	<div id = "description" class="col-md-6 dashboard">
		<h2 class="dash-heading">Edit your account</h2>
		<hr>
		{{ link_to('admin/account/edit/email', "Change email address", ['class' => 'btn btn-default btn-lg btn-block']) }}
		
		{{ link_to('admin/account/edit/password', "Change password", ['class' => 'btn btn-default btn-lg btn-block']) }}
		
		{{ link_to('admin/account/edit/restaurant', "Edit restaurant info", ['class' => 'btn btn-default btn-lg btn-block']) }}
		
	</div>


{{ $admin = false}}
@stop