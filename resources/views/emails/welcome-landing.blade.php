@extends('master')

@section('page-title', 'Confirm - Great American Power')

@section('content')

<div class="remodal-bg">
	<a href="#modal"></a><br>
	<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDesc">
		<div>
			<div id="modalTitle"><h2>You're not done yet!</h2></div>
			<p id="modalDesc" style="text-align:left;"><br>
				<span id="name">{!! $customer->fname !!},</span><br>

				<br>We have received your online enrollment and <b>we will begin processing your enrollment once you click on the confirmation link that was emailed to you</b>.  Please check your spam/junk folder if you did not receive the confirmation email.  This offer may expire if your email address is not confirmed within 24 hours.  Thank you for choosing Great American Power!		
			</p>
		</div><br>

		{!! Form::open(['route' => 'fireWelcomeEmail', 'id' => 'form', 'method' => 'post']) !!}
			{!! csrf_field() !!}
			{!! Form::hidden('customer_id', $customer->id) !!}
		    	<button id="ok-btn" data-remodal-action="confirm" class="remodal-confirm">OK</button>
		{!! Form::close() !!}

		<div class="row">{!! Html::image('images/gap-swoosh.jpg') !!}</div>
	</div>
</div>

{!! Html::style('css/welcome.css') !!}
{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/master.css') !!}
{!! Html::style('dist/remodal.css') !!}
{!! Html::style('dist/remodal-default-theme.css') !!}
{!! Html::style('css/modal.css?v=1') !!}
{!! Html::script('dist/remodal.js') !!}
{!! Html::script('js/email-confirmation.js?v=1') !!}

@endsection