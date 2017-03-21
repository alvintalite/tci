<?php 
	// include 'login_success.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
	<link rel="stylesheet" href="css/datepicker.css">
	
</head>
<!--body starts here-->
<body>
	<!--edit @ header.php-->
	<?php
	include('header.php');
	?>

		<div class="container">
			<div class="col-lg-offset-1 col-lg-10 col-lg-offset-1">
				<div class="row">
					<h2 style="text-align: left;">New Product</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4></h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/addprod.php" method="post">

							<!-- Text input-->
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="prod_name">Product Name</label>
							  		<div class="controls">
							    		<input id="prod_name" name="prod_name" type="text" placeholder="Product Name" class="form-control" required="">						    
							  		</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="pf_name">Finish</label>
							  			<div class="controls">
							   				<select id="pf_name" name="pf_name"  class="form-control" required="">
							      			<option></option>
							      			<option >Glossy</option>
							      			<option>Matte</option>
							    			</select>
							 	 		</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="control-group">
							  		<label class="control-label" for="prod_price">Product Price </label>
							  		<div class="controls">
							    		<input id="prod_price" name="prod_price" type="text" placeholder="Product Price" class="form-control" required="">
							    
							  		</div>
								</div>
							</div>


							
							<div class="col-lg-6">
								<div class="control-group">
									<label class="control-label" for="pc_name">Category</label>
										<div class="controls">
											<select class="form-control" name="pc_name" id="pc_name">
												<option></option>
												<option>House Ware</option>
												<option>B</option>
												<option>AB</option>
												<option>O</option>
											</select>
										</div>
								</div>
							</div>
							
							<div class="col-lg-6">
							 	<div class="control-group">
                                	<label class="control-label" for="prod_desc">Description</label>
                                	<textarea class="form-control" rows="5" name="prod_desc" id="prod_desc"></textarea>
                                </div>
                            </div>

							<div class="col-lg-6">
								<div class="control-group">
									<label class="control-label" for="pg_id">Group</label>
										<div class="controls">
											<select class="form-control" name="pg_id" id="pg_id">
												<option></option>
												<option>Bowl</option>
												<option>Bowl</option>
											</select>
										</div>
								</div>
							</div>
							

							<!-- Text input-->

							<div class="col-lg-6">
								<div class="control-group">
									  <label class="control-label" for="dnationality">Nationality</label>
									  	<div class="controls">
									    	<input id="dnationality" name="dnationality" type="text" placeholder="Nationality" class="form-control" required="">
									    
									  	</div>
								</div>
							</div>

					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Submit</button>
									<a class="btn" href="productlist.php">Back</a>
								</div>		
						  	</div>		
						</form>
					</div>
				</div>		
			</div>
		</div>
  	</div>

  	</div>


<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
