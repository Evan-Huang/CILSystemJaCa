@extends('template.master')

@section('title', 'Client - Create')
@section('pagetitle', 'Client - Create')
@section('pagetitleright')
<a href="{!! action('ClientController@index') !!}" class="btn btn-warning">Back</a>
@stop

@section('body')

@if( count($errors) > 0 )
<div class="alert alert-danger text-center"><strong>Error</strong> Please Check Fields</div>
@endif

@if( Session::get('success') )
<div class="alert alert-success text-center"><strong>Updated Successfully</strong></div>
@endif

{!! Form::open(['url' => action('ClientController@store'), 'method' => 'post', 'files' => true]) !!}

<div class="row">

	<div class="col-xs-12 col-sm-6">
		<h5>Signor</h5>
		{!! Form::select('consultant_id', App\Consultant::getRecordsForSelect(), null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('consultant_id', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Business Type</h5>
		{!! Form::text('business_type', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('business_type', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Full Name</h5>
		{!! Form::text('full_name', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('full_name', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>First Name</h5>
		{!! Form::text('first_name', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('first_name', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Last Name</h5>
		{!! Form::text('last_name', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('last_name', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Gender</h5>

		<label>
			{!! Form::radio('gender', 'Male', false) !!}
			Male
		</label>
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<label>
			{!! Form::radio('gender', 'Female', false) !!}
			Female
		</label>


		{!! $errors->first('gender', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Nationality</h5>
		{!! Form::text('nationality', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('nationality', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-4">
		<h5>Birthdate</h5>
		
		<div class="row">
			<div class="col-xs-4">
				{!! Form::text('birth_year', '', ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'YYYY']) !!}
				{!! $errors->first('birth_year', '<p class="bg-danger">:message</p>') !!}
			</div>

			<div class="col-xs-4">
				{!! Form::text('birth_month', '', ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'MM']) !!}
				{!! $errors->first('birth_month', '<p class="bg-danger">:message</p>') !!}
			</div>

			<div class="col-xs-4">
				{!! Form::text('birth_day', '', ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'DD']) !!}
				{!! $errors->first('birth_day', '<p class="bg-danger">:message</p>') !!}
			</div>
		</div>
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>ID Number</h5>
		{!! Form::text('id_number', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('id_number', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Passport Number</h5>
		{!! Form::text('passport_number', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('passport_number', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Mobile Number</h5>
		{!! Form::text('mobile_number', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('mobile_number', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Email</h5>
		{!! Form::text('email', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('email', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Home Address</h5>
		{!! Form::text('home_address', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('home_address', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Business Nature</h5>
		{!! Form::text('business_nature', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('business_nature', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Company</h5>
		{!! Form::text('company', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('company', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12 col-sm-6">
		<h5>Office Phone Number</h5>
		{!! Form::text('office_phone_number', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('office_phone_number', '<p class="bg-danger">:message</p>') !!}
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