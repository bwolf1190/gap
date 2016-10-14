@extends('brokers.admin.admin-master')

@section('content')

@include('brokers.admin.broker-actions')

<div class="container">
	<div class="row">
		<h1 class="pull-left">Enrollments</h1>
        <li class="export"><span class="glyphicon glyphicon-download-alt pull-right">{!! Html::linkAction('BrokerController@exportEnrollments', 'Export', array('broker' => Auth::user()->name)) !!}</span></li>
	</div>
	<div class="row">
		@include('brokers.admin.broker-enrollments.table')
	</div>
</div>

@endsection