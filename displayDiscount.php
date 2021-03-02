<?php
//DEBUG echo ("Calling display discount");
require_once ('../app_config.php');
require_once (APP_ROOT . APP_FOLDER_NAME . '/scripts/echoHTMLText.php');
require_once (APP_ROOT . APP_FOLDER_NAME . '/scripts/errorDisplay.php');
require_once (APP_ROOT . APP_FOLDER_NAME . '/scripts/utilities.php');
$myJSFile = APP_FOLDER_NAME . '/clientScripts/productDiscount.js';
$myCSSFile = APP_FOLDER_NAME . '/styles/main.css';
//DEBUG echo("File called");
//DEBUG print_r($_POST);
//get from data form
if (isset($_POST['product_description'])){
	$product_description = cleanIO($_POST['product_description']);
	// DEBUG echo($product_description);
}//if
if (isset($_POST['list_price']))
	$list_price = cleanIO($_POST['list_price']);
	//DEBUG echo($list_price);


if (isset($_POST['discount_percent']))
	$discount_percent = cleanIO($_POST['discount_percent']);
if (!filter_var($list_price, FILTER_VALIDATE_FLOAT)) {
	var_dump($list_price);
	echo '<br>';
	echoError("List price must be a number", $myJSFile, $myCSSFile);
	exit();
}//if
if (!filter_var($discount_percent, FILTER_VALIDATE_FLOAT)) {
	var_dump($discount_percent);
	echo '<br>';
	echoError("Discount must be positive up to 100", $myJSFile, $myCSSFile);
	exit();
}//if
//DEBUG echo ($discount_percent);

//app checks
if ($product_description == "")
	echoError("Supply Product Description", $myJSFile, $myCSSFile);
	exit();
if ($product_description != "Guitars" && $product_description != "Pianos" && $product_description != "Other");
	echoError("Incorrect product description", $myJSFile, $myCSSFile);
	exit();
if ($list_price < 0)
	exit("List price must be positive");
if ($discount_percent < 0 || $discount_percent > 100)
	exit("Discount must be positive up to 100");
//calc loan\
$discount = calculateProductDiscount($list_price, $discount_percent);
$discount_price = $list_price - $discount;
echo $discount_price;
//apply currency format

$list_price_formatted = "$" . number_format($list_price, 2);
$discount_percent_formatted = $discount_percent . "%";
$discount_formatted = "$" . number_format($discount, 2);
$discount_price_formatted = "$" . number_format($discount_price,2);
//escape unformatted input
$product_description_escaped = cleanIO($product_description);

echoHead($myJSFile, $myCSSFile);
echoHeader("Discount Information");

echo '


			<main>
			
				<label>Product Discount:</label>
				<span>' . $product_description_escaped . ' </span><br>
				
				<label>List Price:</label>
				<span>' . $list_price_formatted . ' </span><br>
				
				<label>Standard Discount:</label>
				<span>' . $discount_percent_formatted . ' </span><br>
				
				<label>Discount Amount:</label>
				<span>' . $discount_formatted . ' </span><br>
				
				<label>Discount Price:</label>
				<span>' . $discount_price_formatted . ' </span><br>
				
				</main>
';
echoFooter();

?>