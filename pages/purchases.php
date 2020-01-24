 <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <!-- MetisMenu CSS -->
 <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

 <!-- Custom CSS -->
 <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

 <!-- Custom Fonts -->
 <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">






 <form action="savepur.php" method="post" class = "form-group">
 	<div id="ac">
 		<span>Date : </span><input type="date" class = "form-control" name="date" placeholder="MM/DD/YYYY" />
 		<span>Invoice Number : </span><input type="text" class = "form-control" name="iv" />
 		<span>Supplier : </span>
 		<select name="supplier" class = "form-control">
 			<?php
 			include('connect.php');
 			$result = $db->prepare("SELECT * FROM supliers");
 			$result->bindParam(':userid', $res);
 			$result->execute();
 			for($i=0; $row = $result->fetch(); $i++){
 				?>
 				<option><?php echo $row['suplier_name']; ?></option>
 				<?php
 			}
 			?>
 		</select>
 		<span>Remarks : </span><input type="date" class = "form-control" name="date_delivered" />
 		<span>&nbsp;</span><input class="btn btn-primary btn-block"  type="submit" value="save" class = "form-control" />
 	</div>
 </form>