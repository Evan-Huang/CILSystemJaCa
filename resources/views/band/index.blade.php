@extends('template.master')

@section('title', 'Bands')
@section('pagetitle', 'Bands')
@section('pagetitleright')
<a href="{{ action('BandController@create') }}" class="btn btn-info">
	Create
</a>
@stop

@section('body')

<div class="table-responsive">

	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Rank</th>
				<th>Name</th>
				<th>Profit Sharing</th>
				<th>Promotion Income Achievement</th>
				<th>Is Channel</th>

				<th>Updated At</th>
				<th>Manage</th>
			</tr>
		</thead>

		<tbody>
			@foreach( $records as $record )
			<tr>
				<td>{{ $record->id }}</td>

				<td>{{ $record->rank }}</td>
				<td>{{ $record->name }}</td>
				<td>{{ $record->profit_sharing }}</td>
				<td>{{ $record->promotion_income_achievement }}</td>
				<td>{{ $record->is_channel }}</td>
				
				<td>{{ $record->updated_at }}</td>
				<td>
					<a href="{{ action('BandController@edit', [$record->id]) }}" class="btn btn-warning btn-xs">Edit</a>
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
