
    
    var lowerCaseLetters = "abcdefghijklmnopqrstuvwxyz";
    var upperCaseLetters = lowerCaseLetters.toUpperCase();
    var outputstr = "";
    var i;
    for(i=0; i < lowerCaseLetters; i++){
        
        outputstr = outputstr + lowerCaseLetters.charAt(i) + " " + lowerCaseLetters.charCodeAt(i) + "\n";
    }
    
    alert(outputstr);
    
    for(i=0; i < upperCaseLetters; i++){
        
        outputstr = outputstr + upperCaseLetters.charAt(i) + " " + upperCaseLetters.charCodeAt(i) + "\n";
 }
    
    alert(outputstr);