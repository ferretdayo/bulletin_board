	function getdata(id){
		return document.getElementById(id).value;
	}
	
	function radio(){
		var i;
		for(i=0;i<document.form.sex.length;i++){
			if(document.form.sex[i].checked){
				return true;
			}
		}
		return false;
	}
	
	function datacheck(){
		var flg = 0;
		var userid = getdata('userid');
		var username = getdata('username');
		var namelen = username.length;
		var pass = getdata('userpass');
		var email = getdata('email');
		var birth = getdata('birthday');
		if(userid == ""){
			document.getElementById('uid').innerHTML = "un-answered userid";
			flg = 1;
		}else if(namelen > 20){
			document.getElementById('uname').innerHTML = "username is 20 length";
			flg = 1;
		}else{
			document.getElementById('uid').innerHTML = "";
		}
		if(username == ""){
			document.getElementById('uname').innerHTML = "un-answered username";
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
		if(birth == ""){
			document.getElementById('ubirth').innerHTML = "un-answered birthday";
			flg = 1;
		}else{
			document.getElementById('ubirth').innerHTML = "";
		}
		if(!radio()){
			document.getElementById('usex').innerHTML = "un-answered sex";
			flg = 1;
		}else{
			document.getElementById('usex').innerHTML = "";
		}
		if(flg == 1){
			return false;
		}else{
			return true;
		}
	}