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
			<a href="/admin/profile">Profile</a> || <a href="/admin/userlist">All User</a>|| <a href="/admin/medicine">Medicine</a>|| <a href="/logout">logout</a>
		</fieldset>
	</center>

</body>
</html>