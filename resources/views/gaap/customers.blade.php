@include('gaap.header')


<div class="container-fluid">

<div class="col-xs-10 col-xs-offset-1">

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Status</th>
			<th>Account #</th>
			<th>Name</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>

		@foreach($customers as $customer)

			<tr>
				<td> {!! $customer->status !!} </td>
				<td> {!! $customer->acc_num !!} </td>
				<td> {!! $customer->fname . ' ' . $customer->lname !!} </td>
				<td> {!! $customer->email !!} </td>
			</tr>

		@endforeach

	</tbody>
</table>

</div>

</div>


@include('gaap.footer')