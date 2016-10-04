@extends('brokers.admin.admin-master')

@section('content')

@include('brokers.admin.broker-actions')

<div class="row">
	<div class="col-xs-10 col-xs-offset-1">
		<h1>Enrollments</h1>
	</div>
	<div class="col-xs-10 col-xs-offset-1">
		@include('brokers.admin.broker-enrollments.table')
	</div>
</div>

@endsection