<html>
<head>
	<title>Add an animal</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
<h1>Client Information</h1>
<?php 
	$this->view('Owner/detailsPartial', $data['owner'])
?>
<h1>New Pet Information</h1>
<form action='' method='post' enctype="multipart/form-data">
	<label><?= _("Name") ?> :<input type="text" name="name" /></label><br>
	<label><?= _("Date Of Birth")?> :<input type="date" name="dob" /></label><br>

	<label>Country of origin :
		<select name ="country_id">
		<?php
			foreach($data['countries'] as $country){
				echo "<option value ='$country->country_i'>$country->nicename</option>"
			}
		?>
		</select>
	</label><br>

	<label><?= _("Profile Picture")?>:<input type="file" name="profile_pic" id="profile_pic" /></label><img id ='profile_pic_preview' src='/images/blank.jpg' style="max-width:200px; max-height: 200px" /><br>
	<input type="submit" name="action" value="Add new pet" />
</form>

<script>
	profile_pic.onchange = evt =>{
		const [file] =profile_pic.files
		if(file){
			profile_pic_preview.src = URL.createObjectURL(file)
		}
	}
</script>

</body>
</html>