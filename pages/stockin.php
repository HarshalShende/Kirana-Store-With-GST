  <?php
  include('connect.php');
  $id=$_GET['iv'];
  $p_name = $_GET['name'];
  $qty = $_GET['qty'];
  $date = $_GET['date'];
  $t_id = $_GET['tid'];
  $result = $db->prepare("SELECT * FROM purchases_item WHERE id= :userid");
  $result->bindParam(':userid', $t_id);
  $result->execute();
  for($i=0; $row = $result->fetch(); $i++){
    ?>


    <form action="update.php" method="post" class = "form-group" name="stockin_form">
      <div id="ac">
        <input type="hidden" name="invoice" value="<?php echo $id; ?>" class = "form-control" />
        <label>Product Code</label>
        <input type="text" name="product_code" value="<?php
           $rrrrrrr=$row['name'];
            $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
            $resultss->bindParam(':asas', $rrrrrrr);
            $resultss->execute();
            for($i=0; $rowss = $resultss->fetch(); $i++){
              echo $rowss['product_code'];
            }
            ?>" class = "form-control" />
            
        <label>Quantity : </label>
        <input type="text" name="qty" value = "<?php echo $qty; ?>"  class = "form-control"  />
        <label>Status</label>
        <select name="status"  class = "form-control">
         <option>Select</option>
         <option>Received</option>
         <option>Returned</option>
         <option>Cancelled</option>
       </select>
       <label>Expiration Date</label>
       <input type = "date" name = "exdate" class = "form-control" >
       <span>&nbsp;</span>
       <label> Remarks </label>
       <textarea style="width:265px; height:50px;" name="remark"> </textarea>
       <input class="btn btn-primary btn-block" type="submit" class = "form-control" value="save" />
     </div>
   </form>
   <?php
 }
 ?>