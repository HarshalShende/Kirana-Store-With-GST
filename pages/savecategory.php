<?php
session_start();
include('connect.php');
$a = $_POST['catname'];

$sql = "INSERT INTO categories (cat_name) VALUES (?)";
$q = $db->prepare($sql);
$q->execute(array($a));
header("location: products.php");
?>