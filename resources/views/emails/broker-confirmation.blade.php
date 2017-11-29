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
			@if($plan->name == "Introductory Variable")
				{!! $plan->ldc . " " . $plan->length . " Month " . $plan->name . " " . $plan->type . " plan for the price of " . $plan->rate . "." !!}
			@elseif(!(is_null($plan->rate2)))
				{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . " and " . $plan->rate2 . "." !!}
			@else
				{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . "." !!}
			@endif
		</p>

	    <p><b>This enrollment will begin to be processed once the customer confirms their email address by clicking the link sent to them.</b></p>

	</div>
</div>
