<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stripe</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    </head>
    <body>
		<form id="checkout-form" action="/payments" method="POST">
			{{ csrf_field() }}

			<input type="hidden" name="stripeToken" id="stripeToken">
			<input type="hidden" name="stripeEmail" id="stripeEmail">

			<button id="submit" type="submit">Pay Now</button>
		</form>

		<script src="https://checkout.stripe.com/checkout.js"></script>
		
		<script>
			let stripe = StripeCheckout.configure({
				key: 'pk_test_fCutZH8uPJ8nPueoOQ2mhtsz',
				image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
				local: 'auto',
				token: function(token){
					document.querySelector('#stripeEmail').value = token.email;
					document.querySelector('#stripeToken').value = token.id;
					document.querySelector('#checkout-form').submit();
				}
			});

			document.querySelector('button').addEventListener('click', function(e){
				stripe.open({
					name: 'Sign Up Fee',
					description: 'Pay Your Sign Up Fee',
					zipcode: true,
					amount: 2500
				});

				e.preventDefault();
			});
		</script>

    </body>
</html>