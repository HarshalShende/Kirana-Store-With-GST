<?php
session_start();
include('connect.php');
$invoice_id = $_POST['invoice'];
$product_id = $_POST['product_id'];
$product_qty = $_POST['qty'];
$pay_type = $_POST['pt'];
$discount = $_POST['discount'];

$date = date('m/d/Y');
$month = date('F');
$year = date('Y');


$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $product_id);
$result->execute();

for($i=0; $row = $result->fetch(); $i++){
$product_price=$row['price'];
$product_name=$row['product_name'];
$product_desc_name=$row['description_name'];
$product_category=$row['category'];
$qty_left=$row['qty_left'];
$product_gst=$row['gst'];
}

//Update Products Quantity
$sql = "UPDATE products 
        SET qty_left=qty_left-?
		WHERE product_code=?";
$q = $db->prepare($sql);
$q->execute(array($product_qty,$product_id));

//Calculate TOTAL and GST
$rate=$product_price-($product_price*$discount/100);
$total=$rate*$product_qty;
$percent_gst=$product_gst*$product_qty;
$left_qty=$qty_left-$product_qty;
$gst=$product_price*$percent_gst/100;
$pay=$gst+$total;

// Insert Details
$sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,discount,category,date,omonth,oyear,qtyleft,dname,gst,total_amount) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$invoice_id,':b'=>$product_id,':c'=>$product_qty,':d'=>$rate,':e'=>$product_name,':f'=>$product_price,':g'=>$discount,':h'=>$product_category,':i'=>$date,':j'=>$month,':k'=>$year,':l'=>$left_qty,':m'=>$product_desc_name,':n'=>$gst,':o'=>$pay));
header("location: sales.php?id=$pay_type&invoice=$invoice_id");

?>