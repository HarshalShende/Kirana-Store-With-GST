<?php
session_start();
include('connect.php');

$a = $_POST['invoice'];
$b = $_POST['date'];
$c = $_POST['supplier'];
$d = $_POST['date_delivered'];
$e = $_POST['product'];
$f = $_POST['qty'];
$status = $_POST['status'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $e);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){	
	$g=$row['price'];
}
$h=$g*$f;
// query
$sql = "INSERT INTO purchases (invoice_number,date_order,suplier,date_deliver,p_name,qty,cost,status) VALUES (:a,:b,:c,:d,:e,:f,:h,:i)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':h'=>$h,':i'=>$status));



$z = $_POST['invoice'];
$x = $_POST['product'];
$y = $_POST['qty'];
$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $x);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){	
	$asasa=$row['price'];
}

//edit qty

$w=$asasa*$y;

$date = date('Y-m-d');
// query
$sql = "INSERT INTO purchases_item (name,qty,cost,invoice,date,status) VALUES (:x,:y,:w,:z,:u,:v)";
$q = $db->prepare($sql);
$q->execute(array(':x'=>$x,':y'=>$y,':w'=>$w,':z'=>$z,':u'=>$date,':v'=>$status));
header("location: purchase.php?invoice=$a&name=$c");
?>