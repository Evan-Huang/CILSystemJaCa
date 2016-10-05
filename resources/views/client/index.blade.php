@extends('template.master')

@section('title', 'Clients')
@section('pagetitle', 'Clients')
@section('pagetitleright')
<a href="{{ action('ClientController@create') }}" class="btn btn-info">
	Create
</a>
@stop

@section('body')

<div class="table-responsive">

	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Business Type</th>
				<th>Full Name</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Signor</th>
				<th>Gender</th>
				<th>Nationality</th>
				<th>ID Number</th>
				<th>Passport Number</th>
				<th>Birthdate</th>
				<th>Mobile Number</th>
				<th>Email</th>

				<th>Updated At</th>
				<th>Manage</th>
			</tr>
		</thead>

		<tbody>
			@foreach( $records as $record )
			<tr>
				<td>{{ $record->id }}</td>
				<td>{{ $record->business_type }}</td>
				<td>{{ $record->full_name }}</td>
				<td>{{ $record->first_name }}</td>
				<td>{{ $record->last_name }}</td>
				<td>{{ ($record->consultant) ? $record->consultant->name : '--' }}</td>
				<td>{{ $record->gender }}</td>
				<td>{{ $record->nationality }}</td>
				<td>{{ $record->id_number }}</td>
				<td>{{ $record->passport_number }}</td>
				<td>{{ $record->birth_year }}/{{ $record->birth_month }}/{{ $record->birth_day }}</td>
				<td>{{ $record->mobile_number }}</td>
				<td>{{ $record->email }}</td>
				<td>{{ $record->updated_at }}</td>
				<td>
					<a href="{{ action('ClientController@edit', [$record->id]) }}" class="btn btn-warning btn-xs">Edit</a>
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
