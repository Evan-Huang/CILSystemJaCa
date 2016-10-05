@extends('template.master')

@section('title', 'Plan Category - Create')
@section('pagetitle', 'Plan Category - Create')
@section('pagetitleright')
<a href="{!! action('PlanCategoryController@index') !!}" class="btn btn-warning">Back</a>
@stop

@section('body')

@if( count($errors) > 0 )
<div class="alert alert-danger text-center"><strong>Error</strong> Please Check Fields</div>
@endif

@if( Session::get('success') )
<div class="alert alert-success text-center"><strong>Updated Successfully</strong></div>
@endif

{!! Form::open(['url' => action('PlanCategoryController@store'), 'method' => 'post', 'files' => true]) !!}

<div class="row">

	<div class="col-xs-12 col-sm-12">
		<h5>Name</h5>
		{!! Form::text('name', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('name', '<p class="bg-danger">:message</p>') !!}
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