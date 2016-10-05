@extends('template.master')

@section('title', 'Plans')
@section('pagetitle', 'Plans')
@section('pagetitleright')
<a href="{{ action('PlanController@create') }}" class="btn btn-info">
	Create
</a>
@stop

@section('body')

<div class="table-responsive">

	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Plan Category</th>
				<th>Provider</th>
				<th>Name</th>
				<th>Code</th>
				<th>Term</th>
				<th>Requirement</th>
				<th>Description</th>
				<th>Rate (Monthly)</th>
				<th>Rate (Yearly)</th>
				<th>Annual Premium</th>

				<th>Updated At</th>
				<th>Manage</th>
			</tr>
		</thead>

		<tbody>
			@foreach( $records as $record )
			<tr>
				<td>{{ $record->id }}</td>
				<td>{{ ($record->plan_category) ? $record->plan_category->name : '--' }}</td>
				<td>{{ ($record->provider) ? $record->provider->name : '--' }}</td>
				<td>{{ $record->name }}</td>
				<td>{{ $record->code }}</td>
				<td>{{ $record->term }}</td>
				<td>{{ $record->requirement }}</td>
				<td>{{ $record->description }}</td>
				<td>{{ $record->rate_monthly }}</td>
				<td>{{ $record->rate_yearly }}</td>
				<td>{{ $record->annual_premium }}</td>
				
				<td>{{ $record->updated_at }}</td>
				<td>
					<a href="{{ action('PlanController@edit', [$record->id]) }}" class="btn btn-warning btn-xs">Edit</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>

{!! $records->render() !!}

@stop


@section('js')
<script>
$(function()
{

});
</script>
@stop
