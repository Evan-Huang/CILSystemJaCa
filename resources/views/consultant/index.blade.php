@extends('template.master')

@section('title', 'Consultants')
@section('pagetitle', 'Consultants')
@section('pagetitleright')
<a href="{{ action('ConsultantController@create') }}" class="btn btn-info">
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
				<th>Band</th>
				<th>Manager</th>
				<th>Manager Band</th>
				<th>Override for Manager</th>

				<th>Updated At</th>
				<th>Manage</th>
			</tr>
		</thead>

		<tbody>
			@foreach( $records as $record )
			<tr>
				<td>{{ $record->id }}</td>

				<td>{{ $record->name }}</td>
				<td>{{ ($record->band) ? $record->band->name : '--' }}</td>
				<td>{{ ($record->manager) ? $record->manager->name : '--' }}</td>
				<td>{{ ($record->manager && $record->manager->band) ? $record->manager->band->name : '--' }}</td>
				<td>{{ $record->override_for_manager }}</td>
				
				<td>{{ $record->updated_at }}</td>
				<td>
					<a href="{{ action('ConsultantController@edit', [$record->id]) }}" class="btn btn-warning btn-xs">Edit</a>
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
