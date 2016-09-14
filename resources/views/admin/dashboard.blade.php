@extends('admin.admin-master')

@section('content')

<div id="dashboard-container" class="">
	<div class="row">
		<a href="/broker-enrollments/s"><div id="brokers-btn" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Broker Enrollments</h2>
				<span class="glyphicon glyphicon-briefcase col-lg-offset-5 col-md-offset-5 col-sm-offset-5"></span>
			</div>
		</div></a>
		<a href="/customers"><div id="customers-btn" class="col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Customers</h2>
				<span class="glyphicon glyphicon-user col-lg-offset-5 col-md-offset-5 col-sm-offset-5"></span>
			</div>
		</div></a>
	</div>
	<div class="row">
		<a href="/enrollments"><div id="enrollments-btn" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Enrollments</h2>
				<span class="glyphicon glyphicon-usd col-lg-offset-5 col-md-offset-5 col-sm-offset-5"></span>
			</div>
		</div></a>
		<a href="/internalEnrollments"><div id="internal-enrollments-btn" class="col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Internal Enrollments</h2>
				<span class="glyphicon glyphicon-home col-lg-offset-5 col-md-offset-5 col-sm-offset-5"></span>
			</div>
		</div></a>
	</div>
	<div class="row">
		<a href="/analytics"><div id="enrollments-p2c-btn" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Analytics</h2>
				<span class="glyphicon glyphicon-dashboard col-lg-offset-5 col-md-offset-5 col-sm-offset-5"></span>
			</div>
		</div></a>
		<a href="/faqs"><div id="faqs-btn" class="col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>FAQs</h2>
				<span class="glyphicon glyphicon-question-sign col-lg-offset-5 col-md-offset-5 col-sm-offset-5"></span>
			</div>
		</div></a>
	</div>
	<div class="row">
		<a href="/ldcs"><div id="ldcs-btn" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>LDCs</h2>
				<span class="glyphicon glyphicon-map-marker col-lg-offset-5 col-md-offset-5 col-sm-offset-5"></span>

			</div>
		</div></a>
		<a href="/contacts"><div id="messages-btn" class="col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Messages</h2>
				<span class="glyphicon glyphicon-envelope col-lg-offset-5 col-md-offset-5 col-sm-offset-5"></span>
			</div>
		</div></a>
	</div>
	<div class="row">
		<a href="/plans"><div id="plans-btn" class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2>Plans</h2>
				<span class="glyphicon glyphicon-flash col-lg-offset-5 col-md-offset-5 col-sm-offset-5"></span>
			</div>
		</div></a>
		<!--<a href="/logout"><div id="logout" class="col-lg-5 col-md-5 col-sm-5 box grey">
			<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 inner-box">
				<h2 id="logout-title">Logout</h2>
				<span class="glyphicon glyphicon-share-alt col-lg-offset-5 col-md-offset-5 col-sm-offset-5"></span>
			</div>
		</div></a>-->
	</div>
</div>

@endsection