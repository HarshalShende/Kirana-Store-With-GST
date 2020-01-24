<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$sql = "INSERT INTO supliers (suplier_name,suplier_address,suplier_contact,contact_person) VALUES (?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d));
header("location: supplier.php");
?>