@extends('template.master')

@section('title', 'Providers')
@section('pagetitle', 'Providers')
@section('pagetitleright')
<a href="{{ action('ProviderController@create') }}" class="btn btn-info">
	Create
</a>
@stop

@section('body')

<div class="table-responsive">

	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Slug</th>
				<th>Description</th>
				<th>Process Days</th>
				<th>Total Plans</th>

				<th>Updated At</th>
				<th>Manage</th>
			</tr>
		</thead>

		<tbody>
			@foreach( $records as $record )
			<tr>
				<td>{{ $record->id }}</td>
				<td>{{ $record->name }}</td>
				<td>{{ $record->slug }}</td>
				<td>{{ $record->description }}</td>
				<td>{{ $record->process_days }}</td>
				<td>{{ count($record->plans) }}</td>

				<td>{{ $record->updated_at }}</td>
				<td>
					<a href="{{ action('ProviderController@edit', [$record->id]) }}" class="btn btn-warning btn-xs">Edit</a>
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
