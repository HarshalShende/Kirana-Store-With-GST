<?php
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CURE GROCERY</title>

  <link rel="shortcut icon" href="logoc.jpg">
  <!-- Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <!-- DataTables CSS -->
  <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" media="print" href="print.css" />

  <link rel="stylesheet" type="text/css" href="tcal.css" />
  <script type="text/javascript" src="tcal.js"></script>


  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>



</head>

<body>

<div class ="container">
  <?php
  $supplier=$_GET['supplier'];
  ?>
  <h1><?php echo $supplier;  ?>'s  PURCHASE ORDER FORM </h1>
  <div>
    <?php
    $id=$_GET['id'];
    include('connect.php');
    $resultaz = $db->prepare("SELECT * FROM purchases WHERE invoice_number= :xzxz");
    $resultaz->bindParam(':xzxz', $id);
    $resultaz->execute();
    for($i=0; $rowaz = $resultaz->fetch(); $i++){
      echo 'Transaction ID : TR-'.$rowaz['transaction_id'].'<br>';
      echo 'Invoice Number : '.$rowaz['invoice_number'].'<br>';
      echo 'Date Order: '.$rowaz['date_order'].'<br>';
      echo 'Supplier : '.$rowaz['suplier'].'<br>';
      echo 'Date Deliver : '.$rowaz['date_deliver'].'<br>';
    }
    ?>
  </div>
  <table width="90%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
     <tr>
      <th width="10%"> Product Name </th>
      <th width="5%"> Quantity </th>
      <th width="5%"> Cost </th>
    </tr>
  </thead>
  <tbody>

   <?php
   $id=$_GET['id'];
   include('connect.php');
   $result = $db->prepare("SELECT * FROM purchases_item WHERE invoice= :userid");
   $result->bindParam(':userid', $id);
   $result->execute();
   for($i=0; $row = $result->fetch(); $i++){
    ?>
    <tr class="record">
      <td><?php
        $rrrrrrr=$row['name'];
        $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
        $resultss->bindParam(':asas', $rrrrrrr);
        $resultss->execute();
        for($i=0; $rowss = $resultss->fetch(); $i++){
          echo $rowss['product_name'];
        }
        ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td>
          <?php
          $dfdf=$row['cost'];
          echo formatMoney($dfdf, true);
          ?>
        </td>
      </tr>
      <?php
    }
    ?>
    <tr>
      <td colspan="2"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
      <td colspan="2"><strong style="font-size: 12px; color: #222222;">
       <?php
       function formatMoney($number, $fractional=false) {
        if ($fractional) {
         $number = sprintf('%.2f', $number);
       }
       while (true) {
         $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
         if ($replaced != $number) {
          $number = $replaced;
        } else {
          break;
        }
      }
      return $number;
    }
    $sdsd=$_GET['id'];
    $resultas = $db->prepare("SELECT sum(cost) FROM purchases_item WHERE invoice= :a");
    $resultas->bindParam(':a', $sdsd);
    $resultas->execute();
    for($i=0; $rowas = $resultas->fetch(); $i++){
      $fgfg=$rowas['sum(cost)'];
      echo formatMoney($fgfg, true);
    }
    ?>
  </strong></td>
</tr>

</tbody>
</table>

<div class = "pull-right">
  <button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m " >
    Print PO Form
  </button>
</div>   
<a href = "purchaseslist.php" class="btn btn-primary btn-m " >
  Back    
</a>
</div>
<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

<script>
 function myFunction() {
   window.print();
 }
</script>



</body>

</html>