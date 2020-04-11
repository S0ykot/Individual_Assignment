<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
</head>
<body>
<center>
	<h1>Report</h1>
	@if(!Session::get('msg'))
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Date</th>
			<th>Cost</th>
		</tr>
		@for($i=0;$i< count($ord);$i++)
			<tr>
				<td>{{$ord[$i]['order_id']}}</td>
				<td>{{$ord[$i]['order_date']}}</td>
				<td>{{$ord[$i]['total_cost']}}</td>
			</tr>
		@endfor
		<tr>
			<td colspan="2" align="center">Total</td>
			<td>
				<?php
					$x=0; 
					for ($i=0; $i <count($ord) ; $i++) { 
						$x+=$ord[$i]['total_cost'];
					}
					echo $x;
				 ?>
			</td>
		</tr>
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