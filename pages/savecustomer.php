<?php
session_start();
include('connect.php');
$a = $_POST['fname'];
$e = $_POST['mname'];
$f = $_POST['lname'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['memno'];
// query
$sql = "INSERT INTO customer (first_name,address,contact,membership_number,last_name,middle_name,customer_name) VALUES (:a,:b,:c,:d,:e,:f,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$f,':f'=>$e,':h'=>$a.' '.$e.' '.$f ));
header("location: customer.php");


?>