@extends('master')

@section('page-title', 'Confirm - Great American Power')

@section('content')

		<div class="remodal-bg">
		  <a href="#modal"></a><br>
			<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDesc">
			  <div>
			    <div id="modalTitle"><h2>Email Confirmation</h2></div>
			    <p id="modalDesc" style="text-align:left;">
			    	<br>
						<span id="name">{!! $customer->fname !!},</span><br>

						<br>
							We have received your online enrollment for the 
							{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . "/kWh." !!}

						<br><br>
						
						    <b>We will begin processing your enrollment once you click on the confirmation link that was just emailed to you.  Please check your spam/junk folder if you did not receive the confirmation email.</b>  Thank you for choosing Great American Power!
						
			    </p>
			  </div>
			  <br>
			  <button id="ok-btn" data-remodal-action="confirm" class="remodal-confirm" onclick="window.location.href='{!! url("/") !!}';">OK</button>
			</div>
		</div>

@endsection

@section('bottom-scripts')
	{!! Html::style('css/welcome.css') !!}
	{!! Html::style('css/enroll.css') !!}
	{!! Html::style('css/master.css') !!}
	{!! Html::style('dist/remodal.css') !!}
	{!! Html::style('dist/remodal-default-theme.css') !!}
	{!! Html::style('css/modal.css') !!}
	{!! Html::script('dist/remodal.js') !!}
	{!! Html::script('js/email-confirmation.js') !!}
@endsection

