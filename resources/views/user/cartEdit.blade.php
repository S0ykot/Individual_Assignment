<!DOCTYPE html>
<html>
<head>
	<title>Cart Edit</title>
</head>
<body>
<center>
	<h1>Edit cart</h1>
	<form method="POST">
		@csrf
		<table border="1">
			<tr>
				<td>Name :</td>
				<td>{{$cart->name}}</td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="text" name="price" value="{{$cart->price}}" disabled></td>
			</tr>
			<tr>
				<td>Vendor</td>
				<td>{{$cart->vendor}}</td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="text" name="Quantity" value="{{$cart->qntity}}"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Update"></td>
			</tr>
		</table>
	</form>
	<a href="/user/cart">Back</a>

	@if($errors->any())
    {!! implode('', $errors->all('<div><br><p style="color:red">*:message</p></div>')) !!}
	@endif
</center>
</body>
</html>