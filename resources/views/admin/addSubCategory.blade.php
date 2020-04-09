<!DOCTYPE html>
<html>
<head>
	<title>Add SubCategory</title>
</head>
<body>

<center>
	<h1>Add SubCategory</h1>
	<br>
	<form method="POST">
		<table border="1">
			@csrf
			<tr>
				<td>Category Name:</td>
				<td>
					<select name="catName">
						<option value="">Select Category</option>
						@for($i=0;$i < count($cat);$i++)
							<option value="{{$cat[$i]['cat_id']}}">{{$cat[$i]['cat_name']}}</option>
						@endfor
					</select>
				</td>
			</tr>
			<tr>
				<td>SubCategory Name:</td>
				<td><input type="text" name="SubcatName"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
	@if($errors->any())
    {!! implode('', $errors->all('<div><br><p>*:message</p></div>')) !!}
	@endif
	<br>
	<a href="/admin/medicine">Back</a>
</center>
</body>
</html>