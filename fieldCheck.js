function fnameCheck() {
	var field = document.getElementById("fname");
    var sub = document.getElementById("submit");
	
	if (field.value == "") {
		field.style.border = "1px solid red";
        document.getElementById("errorTxt").style.visibility = 'visible';
        document.getElementById("errorTxt").innerHTML = "You must enter a first name";
        
        return true;
	}
    else{
        field.style.border = "1px solid black";
        document.getElementById("errorTxt").style.visibility = 'hidden';
        return false;
    }
}

function lnameCheck() {
	var field = document.getElementById("lname");
    var sub = document.getElementById("submit");
	
	if (field.value == "") {
		field.style.border = "1px solid red";
        document.getElementById("errorTxt").style.visibility = 'visible';
        document.getElementById("errorTxt").innerHTML = "You must enter a last name";
        
        return true;
	}
    else{
        field.style.border = "1px solid black";
        document.getElementById("errorTxt").style.visibility = 'hidden';
        return false;
    }
}

function addressCheck() {
	var field = document.getElementById("address");
    var sub = document.getElementById("submit");
	
	if (field.value == "") {
		field.style.border = "1px solid red";
        document.getElementById("errorTxt").style.visibility = 'visible';
        document.getElementById("errorTxt").innerHTML = "You must enter an address";
        
        return true;
	}
    else{
        field.style.border = "1px solid black";
        document.getElementById("errorTxt").style.visibility = 'hidden';
        return false;
    }
}

function zipCheck() {
	var field = document.getElementById("zip");
    var sub = document.getElementById("submit");
	
	if (field.value == "") {
		field.style.border = "1px solid red";
        document.getElementById("errorTxt").style.visibility = 'visible';
        document.getElementById("errorTxt").innerHTML = "You must enter a zip code";
        
        return true;
	}
    else{
        field.style.border = "1px solid black";
        document.getElementById("errorTxt").style.visibility = 'hidden';
        return false;
    }
}

function cityCheck() {
	var field = document.getElementById("city");
    var sub = document.getElementById("submit");
	
	if (field.value == "") {
		field.style.border = "1px solid red";
        document.getElementById("errorTxt").style.visibility = 'visible';
        document.getElementById("errorTxt").innerHTML = "You must enter a city";
        
        return true;
	}
    else{
        field.style.border = "1px solid black";
        document.getElementById("errorTxt").style.visibility = 'hidden';
        return false;
    }
}

function stateCheck() {
	var field = document.getElementById("state");
    var sub = document.getElementById("submit");
	
	if (field.value == "") {
		field.style.border = "1px solid red";
        document.getElementById("errorTxt").style.visibility = 'visible';
        document.getElementById("errorTxt").innerHTML = "You must enter a state";
        
        return true;
	}
    else{
        field.style.border = "1px solid black";
        document.getElementById("errorTxt").style.visibility = 'hidden';
        return false;
    }
}

function ccCheck() {
	var field = document.getElementById("cc");
    var sub = document.getElementById("submit");
	
	if (field.value == "") {
		field.style.border = "1px solid red";
        document.getElementById("errorTxt").style.visibility = 'visible';
        document.getElementById("errorTxt").innerHTML = "You must enter a Credit Card Number";
        
        return true;
	}
    else{
        field.style.border = "1px solid black";
        document.getElementById("errorTxt").style.visibility = 'hidden';
        return false;
    }
}