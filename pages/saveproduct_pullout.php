<?php
session_start();
include('connect.php');
$a = $_POST['code'];
$b = $_POST['bname'];
$j = $_POST['dname'];
$c = $_POST['cost'];
$f = $_POST['qty'];
$g = $_POST['categ'];
$h = $_POST['exdate'];

$lose = $f*$c;

$date = date('m-d-Y');

$dmonth = date('F');
$dyear = date('Y');

$sql = "INSERT INTO lose 
(product_code,product_name,description_name,amount_lose,qty,date,cost,category,exdate) VALUES (?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$j,$lose,$f,$date,$c,$g,$h));

$sql1 = "UPDATE products 
        SET qty_left=qty_left-?, expiration_date = 0
        WHERE product_code=?";
$q1 = $db->prepare($sql1);
$q1->execute(array($f,$a));

header("location: product_exp.php");


?>