<!DOCTYPE html>
<html>
<head>
	<title>Order Details</title>
</head>
<body>
<center>
	<h1>Order Details</h1>
	@if(!Session::get('msg'))
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Date</th>
			<th>Cost</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		@for($i=0;$i< count($ord);$i++)
			<tr>
				<td>{{$ord[$i]['order_id']}}</td>
				<td>{{$ord[$i]['order_date']}}</td>
				<td>{{$ord[$i]['total_cost']}}</td>
				<td>
					<?php 
						if ($ord[$i]['status']==0) {
							echo "Pending";
						}
						else
						{
							echo "Approved";
						}
					?>
				</td>
				<td><a href="/admin/orders/approved/{{$ord[$i]['order_id']}}">Approved</a></td>
			</tr>

		@endfor
	</table>
	@else
		{{ Session::get('msg') }}

	@endif


	@if($errors->any())
    {!! implode('', $errors->all('<div><br><p style="color:green">*:message</p></div>')) !!}
	@endif

	<a href="/admin">Back</a>
</center>
	
</body>
</html>