<?php
include('connect.php');
$id=$_GET['id'];
$result = $db->prepare("SELECT * FROM customer WHERE customer_id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
	?>

	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- DataTables CSS -->
	<link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

	<!-- DataTables Responsive CSS -->
	<link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

	<form action="saveeditcustomer.php" method="post" class = "form-group">
		<div id="ac">
			<input type="hidden" name="memi" value="<?php echo $id; ?>" />
			<span>First Name : </span><input type="text" name="name" class = "form-control" value="<?php echo $row['first_name']; ?>" />
			<span>Middle Name : </span><input type="text" name="name" class = "form-control" value="<?php echo $row['middle_name']; ?>" />
			<span>Last Name : </span><input type="text" name="name" class = "form-control" value="<?php echo $row['last_name']; ?>" />
			<span>Address : </span><input type="text" name="address" class = "form-control" value="<?php echo $row['address']; ?>" />
			<span>Contact : </span><input type="text" name="contact" class = "form-control" value="<?php echo $row['contact']; ?>" />
			<span>Membership No. : </span><input type="text" name="memno" class = "form-control" value="<?php echo $row['membership_number']; ?>" />
			<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Update" />
		</div>
	</form>
	<?php
}
?>