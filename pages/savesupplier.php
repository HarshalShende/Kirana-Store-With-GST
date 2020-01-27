
<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "inventory");
if(isset($_POST['insert']))
{
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$img=$_FILES['image']['name'];

 $insert="INSERT INTO supliers (suplier_name,suplier_address,suplier_contact,contact_person,images) VALUES ('$a','$b','$c','$d','$img')";
 // 
    if(mysqli_query($connect,$insert))
    {
        move_uploaded_file($_FILES['image']['tmp_name'],"images/supplierimage/$img");
        echo "<script>alert('image is Added')</script>";

    }
    else{
        echo "<script>alert('Image is not added')</script>";
    }
    header("location: supplier.php");
}
?>


<!-- // session_start();
// include('connect.php');
// $a = $_POST['name'];
// $b = $_POST['address'];
// $c = $_POST['contact'];
// $d = $_POST['cperson'];
// $sql = "INSERT INTO supliers (suplier_name,suplier_address,suplier_contact,contact_person) VALUES (?,?,?,?)";
// $q = $db->prepare($sql);
// $q->execute(array($a,$b,$c,$d));
// header("location: supplier.php");
//  -->

