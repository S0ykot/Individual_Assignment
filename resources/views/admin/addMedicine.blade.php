<!DOCTYPE html>
<html>
<head>
	<title>Add Medicine</title>
	<script>
		function subcat_show()
		{

			var cat = document.getElementById('catName').value;
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", "http://localhost:3000/admin/get/"+cat, true);
			xhttp.send();
			  xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			     	document.getElementById('subcat').innerHTML = this.responseText;
			    }
			  };
		}
	</script>
</head>
<body>
<center>
	<h1>Add Medicine</h1>
	<form method="POST">
		<table border="3">
			@csrf
			<tr>
				<td>Name :</td>
				<td><input type="text" name="medicinName"></td>
			</tr>

			<tr>
				<td>Quantity :</td>
				<td><input type="text" name="quantity"></td>
			</tr>

			<tr>
				<td>Vendor :</td>
				<td><input type="text" name="vendor"></td>
			</tr>

			<tr>
				<td>Price :</td>
				<td><input type="text" name="price"></td>
			</tr>

			<tr>
				<td>Category :</td>
				<td>
					<select name="catName" id="catName" onchange="subcat_show()">
						<option value="">Select Category</option>
						@for($i=0;$i < count($cat);$i++)
							<option value="{{$cat[$i]['cat_id']}}">{{$cat[$i]['cat_name']}}</option>
						@endfor
					</select>
				</td>
			</tr>

			<tr>
				<td>Sub Category :</td>
				<td>
					<div id="subcat">
						<select>
							<option value="">Select SubCategory</option>
						</select>
					</div>
				</td>
			</tr>

			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
	<a href="/admin/medicine">Back</a>
	@if($errors->any())
    {!! implode('', $errors->all('<div><br><p>*:message</p></div>')) !!}
	@endif
	<hr>
	<h1>Medicine Details</h1>
	<table border="3">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Vendor</th>
			<th>Category</th>
			<th>SubCategory</th>
		</tr>
		
			@for($i=0;$i< count($m);$i++)
		<tr>
			<td>{{$m[$i]->mid}}</td>
			<td>{{$m[$i]->name}}</td>
			<td>{{$m[$i]->quantity}}</td>
			<td>{{$m[$i]->vendor}}</td>
			<td>{{$m[$i]->cat_name}}</td>
			<td>{{$m[$i]->subcat_name}}</td>
			
		</tr>
			@endfor
	</table>
</center>
</body>
</html>