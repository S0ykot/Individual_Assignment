<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
</head>
<body>
	<center>
		<h1>Welcome {{ Session::get('userid') }}</h1>
		<br>
		<fieldset>
			<a href="/">Home Site</a> || <a href="/user/profile">Profile</a> || <a href="/users/orders">Orders</a> || <a href="/user/passwordchange">Password Change</a> ||<a href="/logout">Logout</a>
		</fieldset>
	</center>

</body>
</html>