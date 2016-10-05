@extends('template.master')

@section('title', 'Consultant - Edit')
@section('pagetitle', 'Consultant - Edit')
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

{!! Form::open(['url' => action('ConsultantController@update', [$record->id]), 'method' => 'put', 'files' => true]) !!}

<div class="row">

	<div class="col-xs-12 col-sm-12">
		<h5>Name</h5>
		{!! Form::text('name', $record->name, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('name', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Band</h5>
		{!! Form::select('band_id', App\Band::getRecordsForSelect(), $record->band_id, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('band_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Manager</h5>
		{!! Form::select('manager_id', App\Consultant::getRecordsForSelect(), $record->manager_id, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('manager_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Override For Manager</h5>
		{!! Form::text('override_for_manager', $record->override_for_manager, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
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

{!! Form::open(['url' => action('ConsultantController@destroy', [$record->id]), 'method' => 'delete']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'style' => 'margin-top: 20px', 'onclick' => 'return confirm("Are you sure want to delete?")']) !!}
{!! Form::close() !!}

@stop

@section('js')
<script>
</script>
@stop