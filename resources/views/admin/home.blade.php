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
			<a href="/">Home Site</a> || <a href="/admin/profile">Profile</a> || <a href="/admin/userlist">All User</a>|| <a href="/admin/medicine">Medicine</a>|| <a href="/admin/report">Report</a>|| <a href="/admin/orders">Orders</a> || <a href="/logout">logout</a>
		</fieldset>
	</center>

</body>
</html>