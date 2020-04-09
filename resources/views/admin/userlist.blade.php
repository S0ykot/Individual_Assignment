<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
</head>
<body>

<center>
	<h1>User List</h1>
	<table border="1">
		<tr>
			<th>UserName</th>
			<th>FullName</th>
			<th>Email</th>
			<th>Type</th>
			<th>Action</th>
		</tr>
		@for($i=0; $i< count($details) ; $i++)
			<tr>
				<td>{{$details[$i]['username']}}</td>
				<td>{{$details[$i]['fullname']}}</td>
				<td>{{$details[$i]['email']}}</td>
				@if($details[$i]['dept_id']==1)
					<td>ADMIN</td>
					@else
					<td>USER</td>
				@endif
				<td><a href="/admin/userlist/delete/{{$details[$i]['id']}}">Delete</a></td>
			</tr>
		@endfor
	</table>
	<br>
	<a href="/admin">Back</a>
	@if($errors->any())
    {!! implode('', $errors->all('<div><br><p style="color:red">*:message</p></div>')) !!}
	@endif
</center>

</body>
</html>