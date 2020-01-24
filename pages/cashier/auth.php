<?php
	include 'connect.php';

	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: index.php");
		exit();
	}

	$session_id  = $_SESSION['SESS_MEMBER_ID'];

	$query = $db->prepare("SELECT * FROM cashier WHERE cashier_id = ?");
	$query->execute(array($session_id));
	$row = $query->fetch();

	$session_cashier_name = $row['cashier_name'];
?>