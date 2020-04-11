<!DOCTYPE html>
<html>
<head>
	<title>{{$data->name}}</title>
</head>
<body>

<center>
	<h1>Medicine Details</h1>
	<form method="POST">
	<table border="1">
		@csrf
		<tr>
			<td>Name :</td>
			<td>{{$data->name}}</td>
		</tr>
		<tr>
			<td>Quantity :</td>
			<td>{{$data->quantity}}</td>
		</tr>
		<tr>
			<td>Vendor :</td>
			<td>{{$data->vendor}}</td>
		</tr>
		<tr>
			<td>Price :</td>
			<td>{{$data->price}}</td>
		</tr>
		<tr>
			<td>Image</td>
			<td><img src="{{URL::to('/') }}/upload/{{$data->image}}" width="100" width="100"></td>	
		</tr>
		<tr>
			<td>Category :</td>
			<td>{{$data->cat_name}}</td>
		</tr>
		<tr>
			<td>SubCategory :</td>
			<td>{{$data->subcat_name}}</td>
		</tr>
		<tr>
			<td>Select Quantity :</td>
			<td>
				<select name="SelectQuantity">
					<option value="">Select Quantity</option>
					@for($i=0;$i < $data->quantity ; $i++)
						<option value="{{$i+1}}">{{$i+1}}</option>
					@endfor
				</select>
			</td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Add to cart"></td>
		</tr>
	</table>
	</form>
	@if($errors->any())
    {!! implode('', $errors->all('<div><br><p style="color:red">*:message</p></div>')) !!}
	@endif

	<a href="/">Back</a>
</center>
</body>
</html>