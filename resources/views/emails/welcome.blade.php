


<div class="container" style="">
	{!! $customer->fname !!} ,

	<p>
		We have received your online enrollment for the 
		{!! $plan->ldc . " " . $plan->length . " Month Fixed " . $plan->type . " plan for the price of " . $plan->rate . "/kWh." !!}

	</p>

    <p><b>We will start to process your enrollment after you follow this link to confirm your email address: </b></p>

    {!! Html::linkAction('EmailController@confirmEmail', 'Click to confirm', array("customer" => $customer, "confirmation_code" => $enrollment->confirmation_code)) !!}

</div>



