@extends('template.master')

@section('title', 'Plan - Edit')
@section('pagetitle', 'Plan - Edit')
@section('pagetitleright')
<a href="{!! action('PlanController@index') !!}" class="btn btn-warning">Back</a>
@stop

@section('body')

@if( count($errors) > 0 )
<div class="alert alert-danger text-center"><strong>Error</strong> Please Check Fields</div>
@endif

@if( Session::get('success') )
<div class="alert alert-success text-center"><strong>Updated Successfully</strong></div>
@endif

{!! Form::open(['url' => action('PlanController@update', [$record->id]), 'method' => 'put', 'files' => true]) !!}

<div class="row">

	<div class="col-xs-12 col-sm-6">
		<h5>Plan Category</h5>
		{!! Form::select('plan_category_id', App\PlanCategory::getRecordsForSelect(), $record->plan_category_id, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('plan_category_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Provider</h5>
		{!! Form::select('provider_id', App\Provider::getRecordsForSelect(), $record->provider_id, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('provider_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Name</h5>
		{!! Form::text('name', $record->name, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('name', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Code</h5>
		{!! Form::text('code', $record->code, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('code', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Term</h5>
		{!! Form::text('term', $record->term, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('term', '<p class="bg-danger">:message</p>') !!}
	</div>
	
	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Requirement</h5>
		{!! Form::textarea('requirement', $record->requirement, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('requirement', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Description</h5>
		{!! Form::textarea('description', $record->description, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('description', '<p class="bg-danger">:message</p>') !!}
	</div>
	
	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Rate (Monthly)</h5>
		{!! Form::text('rate_monthly', $record->rate_monthly, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('rate_monthly', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Rate (Annually)</h5>
		{!! Form::text('rate_yearly', $record->rate_yearly, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('rate_yearly', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Annual Premium</h5>
		{!! Form::text('annual_premium', $record->annual_premium, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('annual_premium', '<p class="bg-danger">:message</p>') !!}
	</div>
	
	<div class="col-xs-12">
		<hr>
	</div>
	
	@for( $i = 1; $i <= 10; $i++ )

	<?php
	$property_name_basic = 'rate_' . $i . '_basic';
	$property_name_override = 'rate_' . $i . '_override';
	$property_name_bonus = 'rate_' . $i . '_bonus';
	?>

	<div class="col-xs-12 col-sm-4">
		<h5>Rate - Basic - {{ $i }} Year</h5>
		{!! Form::text('rate_' . $i . '_basic', $record->$property_name_basic, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('rate_' . $i . '_basic', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Rate - Override - {{ $i }} Year</h5>
		{!! Form::text('rate_' . $i . '_override', $record->$property_name_override, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('rate_' . $i . '_override', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Rate - Bonus - {{ $i }} Year</h5>
		{!! Form::text('rate_' . $i . '_bonus', $record->$property_name_bonus, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('rate_' . $i . '_bonus', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	@endfor

	<div class="col-xs-12 col-sm-4">
		<h5>Rate - Basic - 11+ Year</h5>
		{!! Form::text('rate_11up_basic', $record->rate_11up_basic, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('rate_11up_basic', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Rate - Override - 11+ Year</h5>
		{!! Form::text('rate_11up_override', $record->rate_11up_override, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('rate_11up_override', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Rate - Bonus - 11+ Year</h5>
		{!! Form::text('rate_11up_bonus', $record->rate_11up_bonus, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('rate_11up_bonus', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12">
		<button type="submit" class="btn btn-info btn-block">Save</button>
	</div>

</div>
{!! Form::close() !!}

{!! Form::open(['url' => action('PlanController@destroy', [$record->id]), 'method' => 'delete']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'style' => 'margin-top: 20px', 'onclick' => 'return confirm("Are you sure want to delete?")']) !!}
{!! Form::close() !!}

@stop

@section('js')
<script>
</script>
@stop