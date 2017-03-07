<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {!! Html::script('js/jquery.min.js') !!}
    	{!! Html::script('js/bootstrap.min.js') !!}
        <title>Stripe</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>	
		    <style>
    			.Section .Section--modalBody{
    				background-color: green;
    			}
    			.Button-animationWrapper-child--primary.Button{
    				background-color: green;
    			}
			</style>
		{{ Form::open(['url' => '/payments', 'method' => 'POST', 'id' => 'checkout-form']) }}
			{{ csrf_field() }}
			{{ Form::hidden('stripeToken', '', ['id' => 'stripeToken']) }}
			{{ Form::hidden('stripeEmail', '', ['id' => 'stripeEmail']) }}
			{{ Form::submit('Pay now', ['id' => 'pay']) }}
		{{ Form::close() }}

		<script src="https://checkout.stripe.com/checkout.js"></script>

		<script>
			let stripe = StripeCheckout.configure({
				key: 'pk_test_fCutZH8uPJ8nPueoOQ2mhtsz',
				image: '',
				locale: 'auto',
				token: function(token){
					document.querySelector('#stripeEmail').value = token.email;
					document.querySelector('#stripeToken').value = token.id;
					document.querySelector('#checkout-form').submit();
				}
			});

			$('#pay').on('click', function(e){
				stripe.open({
					name: 'Great American Power',
					description: 'Pay Your Sign Up Fee',
					zipCode: true,
					amount: 2500
				});

				e.preventDefault();
			});
			// Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    lineHeight: '24px',
    color:'red'
  }
};

// Create an instance of the card Element
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');
		</script>

    </body>
</html>