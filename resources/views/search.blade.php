<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<center>
	<table border="2">
		<tr>
			<th>Name</th>
			<th>Vendor</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Image</th>
			<th>Category</th>
			<th>SubCategory</th>
			<th>Action</th>
		</tr>
		@for($i=0; $i< count($data);$i++)
			<tr>
				<td>{{$data[$i]->name}}</td>
				<td>{{$data[$i]->vendor}}</td>
				<td>{{$data[$i]->quantity}}</td>
				<td>{{$data[$i]->price}}</td>
				<td><img src="{{URL::to('/') }}/upload/{{$data[$i]->image}}" width="100" width="100"></td>	
				<td>{{$data[$i]->cat_name}}</td>
				<td>{{$data[$i]->subcat_name}}</td>
				<td><a href="/details/{{$data[$i]->mid}}">Details</a></td>
			</tr>
		@endfor
	</table>
</center>
</body>
</html>