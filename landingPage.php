<?php
require_once ('../app_config.php');
require_once(APP_ROOT.APP_FOLDER_NAME.'/scripts/echoHTMLText.php');
echoHead(APP_FOLDER_NAME.'/clientScripts/productDiscount.js', APP_FOLDER_NAME.'/styles/main.css');
echoHeader("Enter Sales Information");
echo '

        <form action="'.WEB_ROOT.APP_FOLDER_NAME.'/scripts/displayDiscount.php" onsubmit="return /*true;*/ validateProductData();" method="post">
            <div id="data">

		 <label>Product Description:</label>
        <input type="text" id= "product_description" name="product_description"><br>
		
		 <label>List Price:</label>
        <input type="number" id= "list_price" name="list_price" required><br>
		
		 <label>Discount Percent:</label>
        <input type="number" min="0" max="100" name="discount_percent" value="0"><span>%</span>
		</div>
		
		  <div id="buttons">
		  <label>&nbsp;</label>
		  <input type="submit" value="Calculate Discount"><br>
		  </div>
		  
		  </form>
		  ';
echoFooter();
?>