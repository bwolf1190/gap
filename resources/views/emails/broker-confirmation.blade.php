<div class="container">
	<div>
		<p>
			We have received an online enrollment for {!! $customer->fname . " " . $customer->lname . "." !!}
		</p>

		<p>
			{!! "Account #: " . $customer->acc_num !!}
		</p>

		<p>
			@if($customer->sa2 == "")
				{!! "Address: " . $customer->sa1 . " " .  $customer->scity . ", " . $customer->sstate . " " . $customer->szip !!}
			@else
				{!! "Address: " . $customer->sa1 . " " . $customer->sa2 . " " . $customer->scity . ", " . $customer->sstate . " " . $customer->szip !!}
			@endif
		</p>

		<p>
			@if(is_null($plan->rate2)) 
				{!! "Plan: " . $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan at a price of " . $plan->rate . "." !!}
			@elseif($plan->name = "Introductory Variable")
				{!! "Plan: " .  $plan->ldc . " " . $plan->length . " Month " . $plan->type . " plan at a price of " . $plan->rate . "." !!}
			@else
				{!! "Plan: " .  $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan at a price of " . $plan->rate . " and " . $plan->rate2 . "." !!}
			@endif
		</p>

	    <p><b>This enrollment will begin to be processed once the customer confirms their email address by clicking the link sent to them.</b></p>

	</div>
</div>
