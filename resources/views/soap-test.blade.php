<?php

echo $request; 
echo "<br><br>";

foreach($plans as $plan){
	echo $plan['entno'] . '<br>';
	echo $plan['price_code'] . '<br>';
	echo $plan['supno'] . '<br>';
	echo $plan['offer_term'] . '<br>';
	echo $plan['rev_type'] . '<br>';
	echo $plan['offer_price'] . '<br>';
	echo $plan['early_term_type'] . '<br>';
	echo $plan['early_term_amt'] . '<br><br>';
}


