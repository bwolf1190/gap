@extends('master')

@section('page-title', 'Confirmed - Great American Power')

@section('page-style')
	{!! Html::style('css/stripe.css') !!}
@endsection

@section('navbar-brand')

        <a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>

@endsection

@section('content')

<div id='enroll_container' class="container">

<div class="row">
	<div id="summary-panel" class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Payment Confirmation</div>
		<div class="panel-body">
			<p>Thank you for choosing Great American Power.  The summary for your recent credit card payment are displayed below.  Please call Customer Care at 1-877-215-4140 if you have any questions.</p>
		</div>

		<!-- Table -->
		<table class="table table-hover">
			<tbody>
				<tr>
					<td>Customer</td><td>{!! $customer->lname . ', ' . $customer->fname !!}</td>
				</tr>
				<tr>
					<td>Date</td><td>{!! date('m/d/y', strtotime($customer->created_at)) !!}</td>
				</tr>
				<tr>
					<td>Sign Up Fee</td><td>{!! '$' . $amount !!}</td>
				</tr>
				<tr>
					<td>Plan</td><td>{!! $plan->ldc . ' ' . $plan->length . ' Month ' . $plan->type !!}</td>
				</tr>
				<tr>
					<td>Rate</td><td>{!! $plan->rate !!}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

</div>
@endsection

@section('bottom-scripts')

@endsection
