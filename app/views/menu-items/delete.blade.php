@extends('layouts.main')
@section('content')

		<div id="admin" class="col-md-12"><a href="/admin" class="btn btn-info">Go to dashboard</a></div>
		@if (isset($message))
			{{ $message }}
		@endif
		{{ Session::get('message') }}
		<div id = "picture" class="col-md-6">
			{{ Form::open(
			array(
				'url'=>'admin/edit/' . $slug . '/delete',
				'method' => 'POST'
				)
			) }}
			</div>
<div id = "description" class="col-md-6">
			<h3>Really delete this item?</h3>
						{{ Form::submit('Delete', ['class'=>'btn btn-primary']) }}
			{{ Form::close(); }}
			</div>
	


{{ $admin = false }}
@stop