<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>

<form action = "/payment" method= "POST" id="checkout-form">

	{{ csrf_field() }}

	<input type="hidden" name="stripeToken" id="stripeToken">
	<input type="hidden" name="stripeEmail" id="stripeEmail">
	{{ Form::hidden('customer', $customer, array('id' => 'customer')) }}
	{{ Form::hidden('planId', $plan, array('id' => 'planId')) }}
	{{ Form::hidden('amount', $amount, array('id' => 'amount')) }}
	<input type="hidden" name="img-url" id="img-url" value="{{asset('images/gap-compact.jpg')}}">

	<button type="submit" id="pay"> Pay</button>

</form>

<script>

var success = false;

let stripe = StripeCheckout.configure({
	key:"{{ config('services.stripe.key') }}",
	image:document.querySelector('#img-url').value,
	locale:"auto",
	token: function(token){
		document.querySelector('#stripeEmail').value = token.email;
		document.querySelector('#stripeToken').value = token.id;
		document.querySelector('#checkout-form').submit();
		success = true;
	}
})

document.querySelector('button').addEventListener('click', function(e){
	stripe.open({
		name: "Great American Power", 
		description: "Sign Up Fee",
		zipCode: true,
		amount:$('#amount').val(),
		closed: function(){
			// send back to sign up page if the close button was clicked on the modal
			if(success == false){
				$(document).on("DOMNodeRemoved",".stripe_checkout_app", close);

				function close(){
					alert('Please pay your sign up fee to complete your enrollment with Great American Power.');
				 	//history.go(-1);
				 	location.reload();
				}
			}
		}

	});
	
	e.preventDefault();
});

$('#pay').click();


</script>


<style>

#pay{
	display:none;
}

</style>

