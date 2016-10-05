@extends('template.master')

@section('title', 'Consultant - Create')
@section('pagetitle', 'Consultant - Create')
@section('pagetitleright')
<a href="{!! action('ConsultantController@index') !!}" class="btn btn-warning">Back</a>
@stop

@section('body')

@if( count($errors) > 0 )
<div class="alert alert-danger text-center"><strong>Error</strong> Please Check Fields</div>
@endif

@if( Session::get('success') )
<div class="alert alert-success text-center"><strong>Updated Successfully</strong></div>
@endif

{!! Form::open(['url' => action('ConsultantController@store'), 'method' => 'post', 'files' => true]) !!}

<div class="row">

	<div class="col-xs-12 col-sm-12">
		<h5>Name</h5>
		{!! Form::text('name', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('name', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Band</h5>
		{!! Form::select('band_id', App\Band::getRecordsForSelect(), null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('band_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Manager</h5>
		{!! Form::select('manager_id', App\Consultant::getRecordsForSelect(), null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('manager_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Override For Manager</h5>
		{!! Form::text('override_for_manager', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('override_for_manager', '<p class="bg-danger">:message</p>') !!}
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