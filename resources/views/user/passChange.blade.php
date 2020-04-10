<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
<body>
<center>
	<h1>Password Change</h1>
	<form method="POST">
		<table border="1">
			@csrf
			<tr>
				<td>Current Password :</td>
				<td><input type="password" name="currentPassword"></td>
			</tr>
			<tr>
				<td>New Password :</td>
				<td><input type="password" name="newPassword"></td>
			</tr>
			<tr>
				<td>Confirm New Password :</td>
				<td><input type="password" name="currentNewPassword"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="update"></td>
			</tr>
		</table>
	</form>
	<br>
	<a href="/user">Back</a>

	@if($errors->any())
    {!! implode('', $errors->all('<div><br><p>*:message</p></div>')) !!}
	@endif
</center>
</body>
</html>