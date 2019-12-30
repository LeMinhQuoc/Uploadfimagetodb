<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
require "database.php";

		$sql = "SELECT *from image";
		$result = $db->query($sql)->fetch_all();
for ($i=0; $i <count($result) ; $i++) { 
	?>
	<img src="<?php echo $result[$i][1]?>"><br>
	sfasdfgadfaef
	<?php
	# code...
}
?>

</body>
</html>
