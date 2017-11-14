<div class="container">
	<div>
		<p>
			{!! $customer->fname . " " . $customer->lname . " has confirmed their email address.  Their enrollment will be processed within 24 hours. " !!}  
		</p>
		<p>
			{!! "Account #: " . $customer->acc_num !!}
		</p>
	</div>
</div>

