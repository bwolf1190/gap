<div class="container">
	<div>
		{!! $customer->fname !!},

		<p>
			We have received your online enrollment, which we will begin processing once we have received confirmation of your email address. <b>You may do so now by clicking on the following link:</b> 
		</p>

		<a href="https://greatamericanpower.com/emails/confirmation/{{ $customer->id }}/{{ $enrollment->confirmation_code }}">Click to confirm</a><br>

		<p>
			Please note that the plan you have chosen may expire soon, so please do not delay! 
		</p>
	</div>
</div>



