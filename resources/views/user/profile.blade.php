<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body>
<center>
	<h1>Profile Details</h1>
	<form method="POST">
		<table>
			<tr>
				<td>@csrf</td>
			</tr>
		<tr>
			<td>Username :</td>
			<td><input type="text" name="Username" value="{{$username}}" disabled></td>
		</tr>
		<tr>
			<td>FullName :</td>
			<td><input type="text" name="fullname" value="{{$fullname}}"></td>
		</tr>
		<tr>
			<td>Email :</td>
			<td><input type="text" name="email" value="{{$email}}"></td>
		</tr>
		<tr>
			<td>Type :</td>
			<td><?php 
				if ($dept_id!=1) {
					echo "USER";
				}
			 ?></td>
			<td><input type="hidden" name="type" value="{{$dept_id}}"></td>
		</tr>
		<tr>
			<td>Password :</td>
			<td><input type="password" name="password" value=""></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Update"></td>
		</tr>
	</table>
	<br>
	<a href="/user">Back</a>
	@if($errors->any())
    {!! implode('', $errors->all('<div><br><p>*:message</p></div>')) !!}
	@endif
	</form>
</center>
</body>
</html>