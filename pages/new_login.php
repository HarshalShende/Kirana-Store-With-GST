<?php 
	include ('connect.php');

	$a = $_POST['username'];
	$b = $_POST['password'];

	$sql = "SELECT * FROM user WHERE username = ? AND password = ?";
	$query = $db->prepare($sql);
	$query->execute(array($a,$b));
	$row = $query->fetch();

	if ($query->rowCount() > 0){
		session_start();
		$_SESSION['SESS_MEMBER_ID'] = $row['id'];
		echo 1;
	}else{
		echo 0;
	}

?>
