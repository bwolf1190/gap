@include('gaap.header')


<div class="container-fluid">

<div class="col-xs-10 col-xs-offset-1">

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Agent</th>
			<th>Email</th>
			<th>Message</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>

		@foreach($messages as $message)

			<tr>
				<td> {!! $message->agent !!} </td>
				<td> {!! $message->email !!} </td>
				<td> {!! $message->message !!} </td>
				<td> {!! $message->created_at !!} </td>
			</tr>

		@endforeach

	</tbody>
</table>

</div>

</div>


@include('gaap.footer')