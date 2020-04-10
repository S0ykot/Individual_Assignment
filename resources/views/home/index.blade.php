<!DOCTYPE html>
<html>
<head>
	<title>HomePage</title>
</head>
<body>
<center>
	<h1>Welcome to Online Medicine Shop</h1>

	<a href="/login">
	@if(Session::get('userid'))
		<p>My Account <b>({{Session::get('userid')}})</b></p>
		@else
		<p>Login
		</p>
	@endif <a href="/logout">logout</a><br>
	<a href="/signup">Signup</a>
	
</center>
</body>
</html>