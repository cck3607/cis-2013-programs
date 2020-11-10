var $ = function(id) {
	return document.getElementById(id);
};

var loanForm = function() {
	
	
    
	var stringFullName = $("full_name").value;
	var floatMonthsLoan = parseFloat($("months_loan").value);
    var floatLoanAmount = parseFloat($("loan_amount").value);
    var floatAnnualInterest = parseFloat($("annual_interest").value)/100;
    var monthlyRate = floatAnnualInterest/12;
    // debug alert("Your name is " + stringFullName);
    // DEBUG alert("Months of loan is " + floatMonthsLoan);
     //DEBUG alert("Loan amount is "+floatLoanAmount);
     //DEGUB alert("Annual interest is " + floatAnnualInterest);
	//var salesTax =parseFloat($("Sales_Tax").value="");
	//var total =parseFloat($("Total_tax").value="");
	if(isNaN(floatMonthsLoan) || isNaN(floatLoanAmount) || isNaN(floatAnnualInterest)){
		alert("Please enter numbers");
		return false;
	}//if
	$("monthly_payment").value="";
	
    var x = Math.pow(1+monthlyRate,floatMonthsLoan);
	var monthlyPayment= (floatLoanAmount*x*monthlyRate)/(x-1);
	
	
    $("monthly_payment").value = "$" + monthlyPayment.toFixed(2);
	
	
	return false;
	

};//loan form

window.onload = function() {
	
    $("months_loan").value = "";
    $("loan_amount").value = "";
	$("annual_interest").value = "";
	$("monthly_payment").onclick = calculate;
};//onload