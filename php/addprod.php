<?php 
	include '../database.php';

	$pdo = Database::connect();
	$prod_name = $_POST['prod_name'];
	$pf_name = $_POST['pf_name'];
	$prod_price = $_POST['prod_price'];

	$query = $pdo->prepare("SELECT pf_id FROM productfinish WHERE pf_name = ?");
	$query->execute(array($pf_name));
	$pf = $query->fetch(PDO::FETCH_ASSOC);

	$query = $pdo->prepare("INSERT INTO product(Prod_Name, Prod_Price) VALUES(?, ?)");
	$query->execute(array($prod_name, $prod_price));
?>