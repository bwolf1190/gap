<div class="container">
	<div>
		{!! $plan->promo !!},

		<p>
			We have received an online enrollment for {!! $customer->fname . " " . $customer->lname . " for the " !!}  
			{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan at a price of " . $plan->rate . "/kWh." !!}
		</p>

	    <p><b>This enrollment will begin to be processed once the customer confirms their email address by clicking the link sent to them.</b></p>

	</div>
</div>

