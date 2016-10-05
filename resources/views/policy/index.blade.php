@extends('template.master')

@section('title', 'Policies')
@section('pagetitle', 'Policies')
@section('pagetitleright')
<a href="{{ action('PolicyController@create') }}" class="btn btn-info">
	Create
</a>
@stop

@section('body')

<div class="table-responsive">

	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Client</th>
				<th>Policy Number</th>
				<th>Primary TR</th>
				<th>Primary TR Split</th>
				<th>Secondary TR</th>
				<th>Secondary TR Split</th>

				<th>Provider</th>
				<th>Plan</th>

				<th>Effective Date</th>
				<th>Investment Insured Amount (USD)</th>
				<th>Investment Insured Amount (HKD)</th>

				<th>Payment Frequency</th>
				<th>Delivered Date</th>
				<th>Cooling Off Expiry Date</th>
				<th>Next Premium Due Date</th>
				<th>Submission Date</th>
				<th>Completion Date</th>
				<th>Payment Status</th>

				<th>Updated At</th>
				<th>Manage</th>
			</tr>
		</thead>

		<tbody>
			@foreach( $records as $record )
			<tr>
				<td>{{ $record->id }}</td>

				<td>{{ ($record->client) ? $record->client->full_name : '--' }}</td>
				<td>{{ ($record->policy_number) ? $record->policy_number : '--' }}</td>

				<td>{{ ($record->primary_tr) ? $record->primary_tr->name : '--' }}</td>
				<td>{{ ($record->primary_consultant_split) ? $record->primary_consultant_split : '--' }}</td>

				<td>{{ ($record->secondary_tr) ? $record->secondary_tr->name : '--' }}</td>
				<td>{{ ($record->secondary_consultant_split) ? $record->secondary_consultant_split : '--' }}</td>

				<td>{{ ($record->provider) ? $record->provider->name : '--' }}</td>
				<td>{{ ($record->plan) ? $record->plan->name : '--' }}</td>
				
				<td>{{ $record->effective_date }}</td>
				<td>{{ $record->investment_insured_amount_usd }}</td>
				<td>{{ $record->investment_insured_amount_hkd }}</td>
				<td>{{ $record->payment_frequency }}</td>
				<td>{{ $record->delivered_date }}</td>
				<td>{{ $record->cooling_off_expiry_date }}</td>
				<td>{{ $record->next_premium_due_date }}</td>
				<td>{{ $record->submission_date }}</td>
				<td>{{ $record->completion_date }}</td>
				<td>{{ $record->payment_status }}</td>
				
				<td>{{ $record->updated_at }}</td>
				<td>
					<a href="{{ action('PolicyController@edit', [$record->id]) }}" class="btn btn-warning btn-xs">Edit</a>
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
