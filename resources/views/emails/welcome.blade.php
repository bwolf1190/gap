<div class="container">
	<div>
		{!! $customer->fname !!},

		<p>
			We have received your online enrollment for the 

			@if($plan->rate2 != '') 
				{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . " " . $plan->rate2 . "." !!}
			@else
				{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . " and " . $plan->rate2 . "." !!}
			@endif
		</p>

	    <p><b>We will start to process your enrollment after you follow this link to confirm your email address: </b></p>

	    <a href="http://savewithgap.com/~greatamericanpow/emails/confirmation/{{ $customer->id }}/{{ $enrollment->confirmation_code }}">Click to confirm</a>
	</div>
</div>



