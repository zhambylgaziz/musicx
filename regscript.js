function check(){
	var firstname = document.getElementById("first").value;
	var lastname = document.getElementById("last").value;
	var email = document.getElementById("mail").value;
	var username = document.getElementById("user").value;
	var pass = document.getElementById("pass").value;
	var conf = document.getElementById("confirm").value;
	var out = "";
	
	if(firstname == ""){
		out += "Enter your name \n"
	}
	if(lastname == ""){
		out += "Enter your surname \n"
	}
	if(email == ""){
		out += "Type email adress \n"
	}
	if(username == ""){
		out += "Username is empty \n"
	}
	if(pass == ""){
		out += "Enter a password \n"
	}
	if(pass != conf){
		out += "Passwords do not match "
	}
	if(out == ""){
		out = "Welcome " + username + "!";
	}

	alert(out);
}