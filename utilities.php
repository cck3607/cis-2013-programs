<?php
function calculateProductDiscount($list_price, $discount_price) {
	return ($list_price * $discount_price * .01);

}

function cleanIO($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}