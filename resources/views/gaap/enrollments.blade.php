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

		@foreach($enrollments as $enrollment)

			<tr>
				<td> {!! $enrollment->status !!} </td>
				<td> {!! $enrollment->acc_num !!} </td>
				<td> {!! $enrollment->fname . ' ' . $enrollment->lname !!} </td>
				<td> {!! $enrollment->email !!} </td>
			</tr>

		@endforeach

	</tbody>
</table>

</div>

</div>


@include('gaap.footer')