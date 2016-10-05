@extends('template.master')

@section('title', 'Policy - Create')
@section('pagetitle', 'Policy - Create')
@section('pagetitleright')
<a href="{!! action('PolicyController@index') !!}" class="btn btn-warning">Back</a>
@stop

@section('body')

@if( count($errors) > 0 )
<div class="alert alert-danger text-center"><strong>Error</strong> Please Check Fields</div>
@endif

@if( Session::get('success') )
<div class="alert alert-success text-center"><strong>Updated Successfully</strong></div>
@endif

{!! Form::open(['url' => action('PolicyController@store'), 'method' => 'post', 'files' => true]) !!}

<div class="row">

	<div class="col-xs-12 col-sm-6">
		<h5>Client</h5>
		{!! Form::select('client_id', App\Client::getRecordsForSelect(), null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('client_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Policy Number</h5>
		{!! Form::text('policy_number', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('policy_number', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Primary TR</h5>
		{!! Form::select('primary_consultant_id', App\Client::getRecordsForSelect(), null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('primary_consultant_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Primary TR Split</h5>
		{!! Form::text('primary_consultant_split', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('primary_consultant_split', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Secondary TR</h5>
		{!! Form::select('secondary_consultant_id', App\Client::getRecordsForSelect(), null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('secondary_consultant_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Secondary TR Split</h5>
		{!! Form::text('secondary_consultant_split', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('secondary_consultant_split', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Provider</h5>
		{!! Form::select('provider_id', App\Provider::getRecordsForSelect(), null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('provider_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Plan</h5>
		{!! Form::select('plan_id', App\Plan::getRecordsForSelect(), null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('plan_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Effective Date</h5>
		{!! Form::text('effective_date', '', ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
		{!! $errors->first('effective_date', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Investment Insured Amount (USD)</h5>
		{!! Form::text('investment_insured_amount_usd', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('investment_insured_amount_usd', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Investment Insured Amount (HKD)</h5>
		{!! Form::text('investment_insured_amount_hkd', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('investment_insured_amount_hkd', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Payment Frequency</h5>
		{!! Form::text('payment_frequency', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('payment_frequency', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Delivered Date</h5>
		{!! Form::text('delivered_date', '', ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
		{!! $errors->first('delivered_date', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Cooling Off Expiry Date</h5>
		{!! Form::text('cooling_off_expiry_date', '', ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
		{!! $errors->first('cooling_off_expiry_date', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Next Premium Due Date</h5>
		{!! Form::text('next_premium_due_date', '', ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
		{!! $errors->first('next_premium_due_date', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Submission Date</h5>
		{!! Form::text('submission_date', '', ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
		{!! $errors->first('submission_date', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Completion Date</h5>
		{!! Form::text('completion_date', '', ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
		{!! $errors->first('completion_date', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Payment Status</h5>
		{!! Form::text('payment_status', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('payment_status', '<p class="bg-danger">:message</p>') !!}
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