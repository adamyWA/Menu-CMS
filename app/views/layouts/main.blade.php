<!DOCTYPE html>
<html lang="en">
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8" />
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/default.css') }}
		
		<title></title>
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">{{ Restaurant::get()->first()->restaurant_name }}</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
			  
		
				
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
	          
	 @if (Request::path() === 'menu' || Request::path() === '/')	
       <li class="dropdown"> 
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Browse...<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				@foreach (MenuCategory::get() as $category)
				<li data-toggle="collapse" data-target=".in"><a href=#{{ $category->menu_category_slug }}>{{ $category->menu_category_name }}</a></li>
				@endforeach
			</ul>
      </li>   
	@endif
			@if (Auth::check())
				@if (Request::path() !== 'admin')
				{{ '<li><a href="/admin">Dashboard</a></li>' }}
				@endif
				{{ '<li><a href="/admin/logout">Logout...
				</a></li>' }}
			@endif
			@if (!Auth::check())
				{{ '<li><a href="/admin">Login...</a></li>' }}
			@endif
			
      </ul>
    </div>
  </div>
</nav>
			
			
			<div class="row">
			@yield('content')
			</div>

		
		</div>
			<footer class="footer" >
      <div class="container">
	  <div class="col-md-10"></div>
	  <div class="col-md-2">
		<p>{{ Restaurant::get()->first()->restaurant_street_1 }}</p>
		<p>{{ Restaurant::get()->first()->restaurant_street_2 }}</p>
		<p>{{ Restaurant::get()->first()->restaurant_email }}</p>
		<p>{{ Restaurant::get()->first()->restaurant_phone }}</p>
	  </div>
	  
	  </div>

	 
    </footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	{{ HTML::script('js/bootstrap.min.js') }}
	
	</body>
	
</html>
