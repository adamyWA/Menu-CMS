@section('other-items')
@if(MenuItem::find(10)) 
	@if (!isset($admin))
<div class="other-items">
	<h3>Related items:</h3>
	<ul>@foreach(MenuItem::all()->random(2) as $rand)
		<li>
		<a href="/menu/{{$rand->menu_item_slug }}">{{ $rand->menu_item_name }}<img src="{{$rand->menu_item_picture_uri }}" class="other-pics"></a></li>
		
		@endforeach
	</ul>
</div>
	@endif
@endif
@show