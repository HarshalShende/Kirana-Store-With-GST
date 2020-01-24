<?php
session_start();
include('connect.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$pamount = $_POST['p_amount'];
$cname = $_POST['cname'];
$vat=$pamount*.12;

$date = date('m-d-Y');

$dmonth = date('F');
$dyear = date('Y');

if($d=='credit') {
	$f = $_POST['due'];
	$sql = "INSERT INTO sales (invoice_number,cashier,date,type,total_amount,due_date,name,month,year,balance,p_amount,vat) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:k,:j,:l)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$cname,':h'=>$dmonth,':i'=>$dyear,':k'=>$e,':j'=>$pamount,':l'=>$vat));
	header("location: preview.php?invoice=$a");
	exit();
}
if($d=='cash') {
	$f = $_POST['cash'];
	$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,cash,name,month,year,p_amount,vat) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:k,:j)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$cname,':h'=>$dmonth,':i'=>$dyear,':k'=>$pamount,':j'=>$vat));
	header("location: preview.php?invoice=$a");
	exit();
}
// query

?>