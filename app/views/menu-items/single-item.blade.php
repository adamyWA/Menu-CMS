@extends('layouts.main')
@section('content')
		@if (Auth::check())
	<div id="admin" class="col-md-12"><a href="/admin/edit/{{ MenuItem::find($slug)->menu_item_slug }}" class="btn btn-default">Edit</a><a href="/admin/new" class="btn btn-default">New</a></div>
@endif


	<div id = "picture" class="col-md-6 center-pic">
	
		{{ HTML::image(MenuItem::find($slug)->menu_item_picture_uri, 'food', array('class' => 'food')) }}
	</div>
	<div id="description" class="col-md-6">
		<h2>{{ MenuItem::find($slug)->menu_item_name }}</h2>
		<p class="menu-description">
		{{ MenuItem::find($slug)->menu_item_description }}
		</p>
		<h4>Only <span>${{ MenuItem::find($slug)->menu_item_price }}</span>!</h4>
		<a href="/menu" class="btn btn-info">Back to Menu</a>
	</div>
	



@stop