<?php 
	
?>
<?php 
	require 'database.php';

// User Input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 100;

// Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query
$pdo = Database::connect();
$product = $pdo->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM product 
	LIMIT {$start},{$perPage}
");
$product->execute();

$product = $product->fetchAll(PDO::FETCH_ASSOC);

// Pages
$total = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total / $perPage);
?>
<!--Start of Html-->
<!DOCTYPE html>
<html>
<head>


<style>

#myInput {
  background-image: url('./img/searchicon.png');
  background-position: 6px 6px;
  background-repeat: no-repeat;
  font-size: 14px;
  padding: 11px 5px 2px 35px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  margin-left: 1.5in;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 14px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 10px;
}

#myTable tr {
  border-bottom: 2px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>

</head>
<body>
	<?php 
		include('header.php');
	?>
	<div class="container">
		<div class="col-lg-12">
				<div class="row productlist_line">
					<div class="col-md-7" >
						<h2>Products</h2>
					</div>	
				</div>	
					<div class="controls">
			       		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in" style="width: 3in">

			       		<div class="pull-right">
			       		<a href="productcreate.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp; Add Product</a>
			       		</div>


			       		<div class="pull-left">
			       			<div class="col-lg-12">
			       				<select id="category" class="form-control" name="category" onChange="category()">
						     	<option value="" disabled selected hidden> Product Category..</option>
						    	<option>Vase</option>
						    	<option>Lamps</option>
						    	<option>Tables</option>
						    	<option>Wall Decors</option>
					    		</select>

			       			</div>
			       		</div>			    
					</div>
		</div>
	</div>
	      	<br>
			<div class="table-responsive">

				<div class="container">
					<table class="table table-hover table-striped" id="myTable">
					<thead>
						<tr class="alert-info">
							<th>Product ID</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Price</th>
							<th>Size/Dimensions</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>	
					<tbody>					
						<?php					
							$pdo2 = Database::connect();
							$pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql2 = $pdo2->prepare("
									SELECT * FROM productfinish WHERE pf_id = ? 
								");	
							$pdo3 = Database::connect();
							$pdo3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql3 = $pdo3->prepare("
									SELECT * FROM productcategory WHERE pc_id = ? 
								");	

							foreach ($product as $row) {
									$sql2->execute(array($row['did']));
									$data1 = $sql2->fetchAll(PDO::FETCH_ASSOC);

									$sql3->execute(array($row['did']));
									$data2 = $sql3->fetchAll(PDO::FETCH_ASSOC);

									$pdo4 = Database::connect();
									$pdo4->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$sql4 = $pdo4->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
									$sql4->execute(array($row['bloodinfo']));
									$data3 = $sql4->fetch(PDO::FETCH_ASSOC);

								echo '<tr>';
									echo '<td>'.$row['did'] . '</td>';
									echo '<td>'.$row['dfname']. ' ' . substr($row['dmname'],0,1) .'. ' . $row['dlname'].'</td>';
									echo '<td>'.$row['dregdate'].'</td>';
									echo '<td>'.$row['dremarks'].'</td>';
									echo '<td>'.$data3['bloodgroup']. ' ' . $data3['rhtype'].'</td>';
									echo '<td class="text-center">
												<a class="btn btn-primary btn-md" href="viewdonor.php?id='.$row['did'].'" data-toggle="tooltip" title="View"><span class="glyphicon glyphicon-edit"></span></a>
								  		  </td>';									
								echo '</tr>';
							}
							Database::disconnect();
						?>
					</tbody>
				</table>

				</div>
                
			</div> 	

<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
   
</body>
</html>