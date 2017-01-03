@extends('admin.admin-master')

@section('content')

<div id="dashboard-container" class="">
	<div class="row">
		<a href="{{ env('BROKER_ENROLLMENTS') }}"><div id="brokers-btn" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Broker Enrollments</h2>
				<span class="glyphicon glyphicon-briefcase "></span>
			</div>
		</div></a>
		<a href="{{ env('CUSTOMERS') }}"><div id="customers-btn" class="col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Customers</h2>
				<span class="glyphicon glyphicon-user "></span>
			</div>
		</div></a>
	</div>
	<div class="row">
		<a href="{{ env('ENROLLMENTS') }}"><div id="enrollments-btn" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Enrollments</h2>
				<span class="glyphicon glyphicon-usd "></span>
			</div>
		</div></a>
		<a href="{{ env('INTERNAL_ENROLLMENTS') }}"><div id="internal-enrollments-btn" class="col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Internal Enrollments</h2>
				<span class="glyphicon glyphicon-home "></span>
			</div>
		</div></a>
	</div>
	<div class="row">
		<a href="{{ env('ANALYTICS') }}"><div id="enrollments-p2c-btn" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Analytics</h2>
				<span class="glyphicon glyphicon-dashboard "></span>
			</div>
		</div></a>
		<a href="{{ env('FAQS') }}"><div id="faqs-btn" class="col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>FAQs</h2>
				<span class="glyphicon glyphicon-question-sign "></span>
			</div>
		</div></a>
	</div>
	<div class="row">
		<a href="{{ env('LDCS') }}"><div id="ldcs-btn" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>LDCs</h2>
				<span class="glyphicon glyphicon-map-marker "></span>

			</div>
		</div></a>
		<a href="{{ env('MESSAGES') }}"><div id="messages-btn" class="col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Messages</h2>
				<span class="glyphicon glyphicon-envelope "></span>
			</div>
		</div></a>
	</div>
	<div class="row">
		<a href="{{ env('PLANS') }}"><div id="plans-btn" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Plans</h2>
				<span class="glyphicon glyphicon-flash "></span>
			</div>
		</div></a>
		<!--<a href="/logout"><div id="logout" class="col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2 id="logout-title">Logout</h2>
				<span class="glyphicon glyphicon-share-alt "></span>
			</div>
		</div></a>-->
	</div>
</div>

@endsection