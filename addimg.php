<?php 
	require "database.php";

	$pdo = Database::connect();
?>
<!DOCTYPE html>
<html>
<body>
	<form method="post" enctype="multipart/form-data" action="test.php">
		<input type="file" name="image">
		<button type="submit">Submit</button>
		
	</form>
</body>
</html>