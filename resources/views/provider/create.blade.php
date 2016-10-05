@extends('template.master')

@section('title', 'Provider - Create')
@section('pagetitle', 'Provider - Create')
@section('pagetitleright')
<a href="{!! action('ProviderController@index') !!}" class="btn btn-warning">Back</a>
@stop

@section('body')

@if( count($errors) > 0 )
<div class="alert alert-danger text-center"><strong>Error</strong> Please Check Fields</div>
@endif

@if( Session::get('success') )
<div class="alert alert-success text-center"><strong>Updated Successfully</strong></div>
@endif

{!! Form::open(['url' => action('ProviderController@store'), 'method' => 'post', 'files' => true]) !!}

<div class="row">

	<div class="col-xs-12 col-sm-6">
		<h5>Name</h5>
		{!! Form::text('name', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('name', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Slug (Unique code for this provider)</h5>
		{!! Form::text('slug', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('slug', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Description</h5>
		{!! Form::textarea('description', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('description', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Process Days</h5>
		{!! Form::text('process_days', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('process_days', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>
	
	<div class="col-xs-12">
		<button type="submit" class="btn btn-info btn-block">Save</button>
	</div>

</div>
{!! Form::close() !!}

@stop


@section('js')
<script>
</script>
@stop