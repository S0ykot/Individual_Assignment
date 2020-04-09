<!DOCTYPE html>
<html>
<head>
	<title>Medicine Option</title>
</head>
<body>
	<center>
		<h1>Welcome {{ Session::get('userid') }}</h1>
		<br>
		<fieldset>
			<a href="/admin/medicine/addCategory">ADD Category</a> || <a href="/admin/medicine/addSubCategory">ADD SubCategory</a>|| <a href="/admin/medicine/addMedicine">ADD Medicine</a>|| <a href="/logout">logout</a>
			<br>
			<a href="/admin">Back</a>
		</fieldset>
	</center>
</body>
</html>