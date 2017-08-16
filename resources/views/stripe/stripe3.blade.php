<!DOCTYPE html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
</head>

<form action="/payments" type="post">
  {!! csrf_field() !!}
  <label>
    <span>Name</span>
    <input name="cardholder-name" class="field" placeholder="Jane Doe" />
  </label>
  <label>
    <span>Email</span>
    <input name="email" class="field"  />
  </label>
  <label>
    <span>ZIP code</span>
    <input name="address-zip" class="field" placeholder="94110" />
  </label>
  <label>
    <span>Card</span>
    <div id="card-element" class="field"></div>
  </label>
  <button type="submit">Pay $25</button>
  <div class="outcome">
    <div class="error" role="alert"></div>
    <div class="success">
      Success! Your Stripe token is <span class="token"></span>
    </div>
  </div>
</form>





<script>

var stripe = Stripe('pk_test_fCutZH8uPJ8nPueoOQ2mhtsz');
 var elements = stripe.elements();

var card = elements.create('card', {
  hidePostalCode: true,
  style: {
    base: {
      iconColor: '#F99A52',
      color: '#32315E',
      lineHeight: '48px',
      fontWeight: 400,
      fontFamily: '"Helvetica Neue", "Helvetica", sans-serif',
      fontSize: '15px',

      '::placeholder': {
        color: '#CFD7DF',
      }
    },
  }
});
card.mount('#card-element');

function setOutcome(result) {
  var successElement = document.querySelector('.success');
  var errorElement = document.querySelector('.error');
  successElement.classList.remove('visible');
  errorElement.classList.remove('visible');

  if (result.token) {
    // Use the token to create a charge or a customer
    // https://stripe.com/docs/charges
    successElement.querySelector('.token').textContent = result.token.id;
    successElement.classList.add('visible');
  } else if (result.error) {
    errorElement.textContent = result.error.message;
    errorElement.classList.add('visible');
  }
}

card.on('change', function(event) {
  setOutcome(event);
});

document.querySelector('form').addEventListener('submit', function(e) {
  e.preventDefault();
  var form = document.querySelector('form');

  var extraDetails = {
    name: form.querySelector('input[name=cardholder-name]').value,
    name: form.querySelector('input[name=email]').value,
    address_zip: form.querySelector('input[name=address-zip]').value
  };
  
  stripe.createToken(card, extraDetails).then(setOutcome);
  alert(result.token.id);
});

</script>







<style>

* {
  font-family: "Helvetica Neue", Helvetica, sans-serif;
  font-size: 15px;
  font-variant: normal;
  padding: 0;
  margin: 0;
}

html {
  height: 100%;
}

body {
  background: #F6F9FC;
  display: flex;
  align-items: center;
  min-height: 100%;
}

form {
  width: 480px;
  margin: 20px auto;
}

label {
  position: relative;
  color: #6A7C94;
  font-weight: 400;
  height: 48px;
  line-height: 48px;
  margin-bottom: 10px;
  display: block;
}

label > span {
  float: left;
}

.field {
  background: white;
  box-sizing: border-box;
  font-weight: 400;
  border: 1px solid #CFD7DF;
  border-radius: 24px;
  color: #32315E;
  outline: none;
  height: 48px;
  line-height: 48px;
  padding: 0 20px;
  cursor: text;
  width: 76%;
  float: right;
}

.field::-webkit-input-placeholder { color: #CFD7DF; }
.field::-moz-placeholder { color: #CFD7DF; }
.field:-ms-input-placeholder { color: #CFD7DF; }

.field:focus,
.field.StripeElement--focus {
  border-color: #F99A52;
}

button {
  float: left;
  display: block;
  background-image: linear-gradient(-180deg, #F8B563 0%, #F99A52 100%);
  box-shadow: 0 1px 2px 0 rgba(0,0,0,0.10), inset 0 -1px 0 0 #E57C45;
  color: white;
  border-radius: 24px;
  border: 0;
  margin-top: 20px;
  font-size: 17px;
  font-weight: 500;
  width: 100%;
  height: 48px;
  line-height: 48px;
  outline: none;
}

button:focus {
  background: #EF8C41;
}

button:active {
  background: #E17422;
}

.outcome {
  float: left;
  width: 100%;
  padding-top: 8px;
  min-height: 20px;
  text-align: center;
}

.success, .error {
  display: none;
  font-size: 13px;
}

.success.visible, .error.visible {
  display: inline;
}

.error {
  color: #E4584C;
}

.success {
  color: #F8B563;
}

.success .token {
  font-weight: 500;
  font-size: 13px;
}

</style>
