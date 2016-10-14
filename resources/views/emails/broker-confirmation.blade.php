


<div class="container">
	<div>
		{!! $customer->fname !!},

		<p>
			We have received your online enrollment for the 
			{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . "/kWh." !!}
		</p>

	    <p><b>This enrollment will begin to be processed once the customer confirms their email address by clicking the link sent to them.</b></p>

	</div>
</div>

