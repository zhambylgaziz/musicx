function check(){
	var username = document.getElementById("user").value;
	var pass = document.getElementById("pass").value;
	var out = "";
	if(username == ""){
		out += "Username is empty \n"
	}
	if(pass == ""){
		out += "Enter a password "
	}
	if(out == ""){
		out = "Welcome " + username + "!";
	}
	alert(out);
}