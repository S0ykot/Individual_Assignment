<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
</head>
<body>
<center>
	<h1>Cart Details</h1>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Vendor</th>
			<th>Total Price</th>
			<th>Action</th>
		</tr>
		@for($i=0;$i< count($cart);$i++)
			<tr>
				<td align="center">{{$cart[$i]->id}}</td>
				<td align="center">{{$cart[$i]->name}}</td>
				<td align="center">{{$cart[$i]->price}}</td>
				<td align="center">{{$cart[$i]->qntity}}</td>
				<td align="center">{{$cart[$i]->vendor}}</td>
				<td align="center">{{$cart[$i]->total_price}}</td>
				<td><a href="/user/cart/remove/{{$cart[$i]->id}}">Remove</a> || <a href="/user/cart/edit/{{$cart[$i]->id}}">Edit</a></td>
			</tr>
		@endfor
		<tr>
			<td colspan="4"></td>
			<td><b>Total=</b></td>
			<?php 
				$x = 0;
				for($i=0;$i< count($cart);$i++)
				{
					$x+=$cart[$i]->total_price;
				}
			 ?>
			 <td align="center">{{$x}}</td>
			 <form method="POST">
			 	@csrf
			 <td><input type="submit" name="submit" value="Checkout"></td>
			</form>
		</tr>
	</table>
	<a href="/">Back</a> ||
	<a href="/user">My Account</a>

	@if($errors->any())
    {!! implode('', $errors->all('<div><br><p style="color:green">*:message</p></div>')) !!}
	@endif
</center>
</body>
</html>