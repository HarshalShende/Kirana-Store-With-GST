
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



<form action="savecustomer.php" method="post" enctype="multipart/form-data" class = "form-group">
	<div id="ac">
		<span>Name : </span><input type="text" name="name" class = "form-control" required="required" />
		<span>Address : </span><input type="text" name="address" class = "form-control" required="required" />
		<span>Contact : </span><input type="text" name="contact" class = "form-control" required="required" />
		<!-- <span>Membership No. : </span><input type="text" name="memno" class = "form-control" required="required" value = "<?php echo $pcode ?>" /> -->
		<span>Upload Image:</span> <input type="file" id="image" name="image" class="form-control" required="required" /> 
		<span>&nbsp;</span><input class="btn btn-primary btn-block" name="submit" id="submit" type="submit" value="save" class = "form-control" />
	</div>
</form>