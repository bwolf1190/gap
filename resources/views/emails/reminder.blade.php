<div class="container">
	<div>
		{!! $customer->fname !!},

		<p>
			<!-- The plan no longer exists -->
			@if($plan->name === "Empty")
				We have yet to hear back from you about your recent online enrollment with Great American Power.  Please call us at 1-877-215-4140 if you have any questions.
			@else
				We have not heard back from you about your recent online enrollment for the  

				@if($plan->name == "Introductory Variable")
					{!! $plan->ldc . " " . $plan->length . " Month " . $plan->name . " " . $plan->type . " plan for the price of " . $plan->rate . "." !!}
				@elseif(!(is_null($plan->rate2)))
					{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . " and " . $plan->rate2 . "." !!}
				@else
					{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . "." !!}
				@endif
			@endif
		</p>

	    <p><b>If you would still like to enroll, please follow this link to confirm your email address: </b></p>

	    <a href="http://greatamericanpower.com/emails/confirmation/{{ $customer->id }}/{{ $enrollment->confirmation_code }}">Click to confirm</a>

	</div>
</div>