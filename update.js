	function getdata(id){
		return document.getElementById(id).value;
	}
	
	function datacheck(){
		var flg = 0;
		var username = getdata('username');
		var namelen = username.length;
		var pass = getdata('userpass');
		var email = getdata('email');
		if(username == ""){
			document.getElementById('uname').innerHTML = "un-answered username";
			flg = 1;
		}else if(namelen > 20){
			document.getElementById('uname').innerHTML = "username is 20 length";
			flg = 1;
		}else{
			document.getElementById('uname').innerHTML = "";
		}
		if(pass == ""){
			document.getElementById('upass').innerHTML = "un-answered password";
			flg = 1;
		}else{
			document.getElementById('upass').innerHTML = "";
		}
		if(email == ""){
			document.getElementById('uemail').innerHTML = "un-answered email";
			flg = 1;
		}else{
			document.getElementById('uemail').innerHTML = "";
		}
		if(flg == 1){
			return false;
		}else{
			return true;
		}
	}
