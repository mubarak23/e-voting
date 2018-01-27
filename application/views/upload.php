<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<form action="<?php echo base_url(); ?>upload/index" method="post" enctype="multipart/form-data" >
<label>Image</label>

<input type="file" name="image" size="200" />

<br /><br />

<input type="submit" name="upload" value="upload" />

</form>

</body>
</html>