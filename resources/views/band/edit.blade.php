@extends('template.master')

@section('title', 'Band - Edit')
@section('pagetitle', 'Band - Edit')
@section('pagetitleright')
<a href="{!! action('BandController@index') !!}" class="btn btn-warning">Back</a>
@stop

@section('body')

@if( count($errors) > 0 )
<div class="alert alert-danger text-center"><strong>Error</strong> Please Check Fields</div>
@endif

@if( Session::get('success') )
<div class="alert alert-success text-center"><strong>Updated Successfully</strong></div>
@endif

{!! Form::open(['url' => action('BandController@update', [$record->id]), 'method' => 'put', 'files' => true]) !!}

<div class="row">

	<div class="col-xs-12 col-sm-12">
		<h5>Rank</h5>
		{!! Form::text('rank', $record->rank, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('rank', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Name</h5>
		{!! Form::text('name', $record->name, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('name', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Profit Sharing</h5>
		{!! Form::text('profit_sharing', $record->profit_sharing, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('profit_sharing', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Promotion Income Achievement</h5>
		{!! Form::text('promotion_income_achievement', $record->promotion_income_achievement, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
		{!! $errors->first('promotion_income_achievement', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>

	<div class="col-xs-12 col-sm-12">
		<h5>Is Channel?</h5>

		<label class="form-control">
			{!! Form::checkbox('is_channel', '1', ($record->is_channel)) !!}
			Is Channel
		</label>

		{!! $errors->first('is_channel', '<p class="bg-danger">:message</p>') !!}
	</div>

	<div class="col-xs-12">
		<hr>
	</div>
	
	<div class="col-xs-12">
		<button type="submit" class="btn btn-info btn-block">Save</button>
	</div>

</div>
{!! Form::close() !!}

{!! Form::open(['url' => action('BandController@destroy', [$record->id]), 'method' => 'delete']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'style' => 'margin-top: 20px', 'onclick' => 'return confirm("Are you sure want to delete?")']) !!}
{!! Form::close() !!}

@stop

@section('js')
<script>
</script>
@stop