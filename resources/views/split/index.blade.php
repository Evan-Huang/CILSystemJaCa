@extends('template.master')

@section('title', 'Splits')
@section('pagetitle', 'Splits')
@section('pagetitleright')
<a href="{{ action('SplitController@create') }}" class="btn btn-info">
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
				<th>Rate</th>

				<th>Updated At</th>
				<th>Manage</th>
			</tr>
		</thead>

		<tbody>
			@foreach( $records as $record )
			<tr>
				<td>{{ $record->id }}</td>
				<td>{{ $record->name }}</td>
				<td>{{ $record->rate }}</td>
				
				<td>{{ $record->updated_at }}</td>
				<td>
					<a href="{{ action('SplitController@edit', [$record->id]) }}" class="btn btn-warning btn-xs">Edit</a>
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
