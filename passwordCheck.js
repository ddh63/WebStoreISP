function passwordEqual() {
	var pass = document.getElementById("passReg");
	var passCheck = document.getElementById("passCheckReg");

	if (pass.value != passCheck.value) {
		passCheck.style.border = "1px solid rgb(178, 34, 34)";
	} 
	else {
		passCheck.style.border = "0px solid black";
	}
}