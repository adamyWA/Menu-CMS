@extends('layouts.main')
@section('content')

<div id = "main-page" class="col-md-12 menu">
	
			<ul class="main-menu">
			@foreach($cat_id as $id) 
			@if(MenuItem::where('menu_item_category_fk', '=', $id)->first())
			<li><a name={{ MenuCategory::where
					('menu_category_id', '=', $id)
					->first()
					->menu_category_slug }}></a><h2 class="cat-heading">
					{{ MenuCategory::where
					('menu_category_id', '=', $id)
					->first()
					->menu_category_name }}</h2></li><hr>
			@endif 
			@foreach(MenuItem::where('menu_item_category_fk', '=', $id)->get() as $result)
			
				<div class="row col-md-12">
				<li><div class="col-md-1"></div><div class="col-md-3"><a href={{ "menu/$result->menu_item_slug" }}>{{ HTML::image(
									$result->menu_item_picture_uri, 'food',
									array('class' => 'menu-thumb')) }}</a>
					</div>
					<div class="col-md-4 menu">
					<div class="col-md-12 push" >
					<h3>{{ link_to('menu/' . $result->menu_item_slug, $result->menu_item_name, ['class' => '']) . "<span class='price-span'>$" .  $result->menu_item_price }}</span></h3>
					<p><em>{{ $result->menu_item_short }}</em></p>
					</div>
					</div>
					<div class="col-md-4"></div>
					</li> 
				</div>
			
			@endforeach
					<hr>
			@endforeach
			
			</ul>
			
	
</div>

	{{ $admin = false }}
@stop

