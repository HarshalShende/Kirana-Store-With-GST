<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "inventory");
if(isset($_POST['insert']))
{
$a = $_POST['fname'];
$b = $_POST['mname'];
$c = $_POST['lname'];
$d = $_POST['address'];
$e = $_POST['contact'];
$f = $_POST['memno'];
$g = $_POST['fname'].$_POST['mname'].$_POST['lname'];
$img=$_FILES['image']['name'];

 $insert="INSERT INTO customer (first_name,middle_name,last_name,address,contact,membership_number,customer_name,images) VALUES ('$a','$b','$c','$d','$e','$f','$g','$img')";
 // 
    if(mysqli_query($connect,$insert))
    {
        move_uploaded_file($_FILES['image']['tmp_name'],"images/customerimage/$img");
        echo "<script>alert('image is Added')</script>";

    }
    else{
        echo "<script>alert('Image is not added')</script>";
    }
    header("location: customer.php");
}


// query
// $sql = "INSERT INTO customer (first_name,address,contact,membership_number,last_name,middle_name,customer_name) VALUES (:a,:b,:c,:d,:e,:f,:h)";
// $q = $db->prepare($sql);
// $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$f,':f'=>$e,':h'=>$a.' '.$e.' '.$f ));
header("location: customer.php");
?>