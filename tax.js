var $ = function(id) {
	return document.getElementById(id);
};

var taxForm = function() {
	
	
    
	var floatSubTotal = parseFloat($("Subtotal").value);
	var floatTaxRate = parseFloat($("Tax_Rate").value);
    var floatShippingCharges = parseFloat($("Shipping_Charges").value);
	//var salesTax =parseFloat($("Sales_Tax").value="");
	//var total =parseFloat($("Total_tax").value="");
	if(isNaN(floatSubTotal) || isNaN(floatTaxRate) || isNaN(floatShippingCharges)){
		alert("Please enter numbers");
		return false;
	}
	$("Sales_Tax").value="";
	$("Total_tax").value="";
	
	var salesTax = floatSubTotal * (floatTaxRate/100);
	salesTax = parseFloat(salesTax.toFixed(2));
	var total = floatSubTotal + salesTax + floatShippingCharges;
	
    $("Sales_Tax").value = "$" + salesTax.toFixed(2);
	$("Total_tax").value = "$" + total.toFixed(2);
	
	return false;
	

};

window.onload = function() {
	
    $("Subtotal").value = "";
    $("Tax_Rate").value = "";
	$("Shipping_Charges").value = "";
    $("Sales_Tax").onclick = calculate;
	$("Total_tax").onclick = calculate;
    

};


