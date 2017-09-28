<div class="container">
	<div>
		<p>
			{!! $gaapMessage->message !!}
		</p>
		<br>
		<p>
			Name: {!! $gaapMessage->agent !!}<br>
			Email: {!! $gaapMessage->email !!}<br>
			Date: {!! $gaapMessage->created_at !!}<br>
		</p>
	</div>
</div>
