<!DOCTYPE html>
<html>
<head>
	<title>some title</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script scr="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<>
<script type="text/javascript">

$(document).ready(
	function(){
		$.getJSON( "/Main/foddsJSON", 
			function(obj){
				output ="";
				for(const item of obj){
					output = output+ item.name + item.id + "<br>";
				}
				$('#foods').html(output);

			}
		)	
	}
);	
</script>


</head>
<body>

	Here is a list of foods from our database

	<table>
		<tr><th>id</th><th>name</th><th>action</th></tr>
		<?php
			foreach($data as $food){
				echo "<tr><td>$food->id</td>
				<td>$food->name</td>
				<td><a href ='/Food/delete/$food->id'> Delete</a></td</tr>";
			}

		?>
	</table>	
	<form action='' method='post'>
		<input type='text'name='new_food' /></br>
		<input type='submit'name='send' name='action' />
	</form>

<a href='/Main/index'> go the Main/index</a>	


</body>



</html>