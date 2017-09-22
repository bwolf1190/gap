<div class="container">
	<div>
		{!! $plan->promo !!},

		<p>
			We have received an online enrollment for {!! $customer->fname . " " . $customer->lname . " for the " !!}  

			@if(is_null($plan->rate2)) 
				{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . "." !!}
			@elseif($plan->name = "Introductory Variable")
				{!! $plan->ldc . " " . $plan->length . " Month " . $plan->type . " plan for the price of " . $plan->rate . "." !!}
			@else
				{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . " and " . $plan->rate2 . "." !!}
			@endif
		</p>

	    <p><b>This enrollment will begin to be processed once the customer confirms their email address by clicking the link sent to them.</b></p>

	</div>
</div>
