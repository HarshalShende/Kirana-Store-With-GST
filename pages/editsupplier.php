<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM supliers WHERE suplier_id= :userid");
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





<form action="saveeditsupplier.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" class = "form-control" name="memi" value="<?php echo $id; ?>" />
<span>Name : </span><input type="text" class = "form-control"  name="name" value="<?php echo $row['suplier_name']; ?>" />
<span>Contact Person : </span><input type="text" class = "form-control" name="cperson" value="<?php echo $row['contact_person']; ?>" />
<span>Address : </span><input type="text" class = "form-control" name="address" value="<?php echo $row['suplier_address']; ?>" />
<span>Contact : </span><input type="text" class = "form-control" name="contact" value="<?php echo $row['suplier_contact']; ?>" />
<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" value="save" class = "form-control" />
</div>
</form>
<?php
}
?>