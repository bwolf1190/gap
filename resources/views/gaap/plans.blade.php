@include('gaap.header')


<div class="container-fluid">

<div class="col-xs-10 col-xs-offset-1">

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>LDC</th>
			<th>Type</th>
			<th>Length</th>
			<th>Rate</th>
			<th>ETF</th>
		</tr>
	</thead>
	<tbody>

		@foreach($plans as $plan)

			<tr>
				<td> {!! $plan->ldc !!} </td>
				<td> {!! $plan->type !!} </td>
				<td> {!! $plan->length !!} </td>
				<td> {!! $plan->rate !!} </td>
				<td> {!! $plan->etf_description !!} </td>
			</tr>

		@endforeach

	</tbody>
</table>

</div>

</div>


@include('gaap.footer')