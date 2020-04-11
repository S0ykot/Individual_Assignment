<!DOCTYPE html>
<html>
<head>
	<title>HomePage</title>
	<script>
		function search()
		{

			var search = document.getElementById('search').value;
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", "http://localhost:3000/search/"+search, true);
			xhttp.send();
			  xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			     	document.getElementById('res').innerHTML = this.responseText;
			    }
			    else
			    {
			    	document.getElementById('res').innerHTML ="<br> <h4>No Data found</h4>";
			    }
			  };
		}
	</script>
</head>
<body>
<center>
	<fieldset>
		<h1>Welcome to Online Medicine Shop</h1>

	
	@if(Session::get('userid'))
		<a href="/login"><p>[+] My Account <b>({{Session::get('userid')}})</b></p></a>
		@if(Session::get('type')==2)
			<a href="/user/cart">[+] Cart</a> |||
		@endif
		<a href="/logout">[+] Logout</a><br>
		@else
		<a href="/login"><p>[+] Login</b></p></a>
	@endif 
	<br>
	
	<a href="/signup">[+] Signup</a>
	
	</fieldset>

	<fieldset>
		<h3>Search Medicine</h3>
		<input type="text" name="search" id="search" onkeyup="search()"><button>Search</button><br>
		<div id="res">
			
		</div>
	</fieldset>
</center>
</body>
</html>