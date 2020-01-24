 <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <!-- MetisMenu CSS -->
 <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

 <!-- Custom CSS -->
 <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

 <!-- Custom Fonts -->
 <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


 <?php
 function createRandomPassword() {
 	$chars = "003232303232023232023456789";
 	srand((double)microtime()*1000000);
 	$i = 0;
 	$pass = '' ;
 	while ($i <= 7) {

 		$num = rand() % 33;

 		$tmp = substr($chars, $num, 1);

 		$pass = $pass . $tmp;

 		$i++;

 	}
 	return $pass;
 }
 $finalcode='IN-'.createRandomPassword();
 ?>
 
 <form action="saveledger.php" method="post" class = "form-group">
 	<input type="hidden" name="name" class = "form-control" value="<?php echo $_GET['invoice']; ?>" />
 	<input type="hidden" name="invoice" class = "form-control" value="<?php echo $finalcode; ?>" />
 	<input type="hidden" name="tot" class = "form-control" value="<?php echo $_GET['amount']; ?>" />
 	<div id="ac">
 		<span>Amount : </span><input type="text" name="amount" class = "form-control" />
 		<span>Remarks : </span><input type="text" name="remarks" class = "form-control" />
 		<span>&nbsp;</span><input class="btn btn-primary btn-block"  type="submit" value="save" class = "form-control" />
 	</div>
 </form>