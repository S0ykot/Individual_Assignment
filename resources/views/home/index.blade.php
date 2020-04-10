<!DOCTYPE html>
<html>
<head>
	<title>HomePage</title>
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
		<input type="text" name="search" id="search"><button>Search</button><br>
		<input type="checkbox" name="vendor">Vendor <input type="checkbox" name="vendor">
	</fieldset>
</center>
</body>
</html>