<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>

<select name="subcat">
	@for($i=0;$i < count($data);$i++)
	<option value="{{$data[$i]['subcat_id']}}">{{$data[$i]['subcat_name']}}</option>
	@endfor
</select>


</body>
</html>