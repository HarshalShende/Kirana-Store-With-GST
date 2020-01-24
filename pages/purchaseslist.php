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


  <!-- DataTables CSS -->
  <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
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


       <?php include('navfixed.php');?>    

       <!-- Page Content -->
       <div id="page-wrapper">
        <div class="container-fluid">
         <div class="row">
          <div class="col-lg-12">
           <h1 class="page-header">PURCHASE ORDER LIST</h1>
         </div>
         <div id="maintable">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
             <tr>

              <th class ="hidden" > Transaction ID </th>
              <th width="12%"> Invoice No. </th>
              <th width="10%"> Date Ordered </th>
              <th width="12%"> Supplier </th>
              <th width="10%"> Date Deliver </th>
              <th class = "hidden"> Product Code </th>
              <th width="15%"> Brand Name </th>
              <th width="15%"> Description Name </th>
              <th width="7%"> Qty </th>
              <th width="8%"> Cost </th>
              <th width="12%"> Status </th>
              <th width="15%"> Action </th>
            </tr>
          </thead>
          <tbody>


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

          include('connect.php');
          $result = $db->prepare("SELECT * FROM purchases ORDER BY transaction_id desc");
          $result->execute();
          for($i=0; $row = $result->fetch(); $i++){
            ?>
            <tr class="record">
             <td class = "hidden"><?php echo $row['transaction_id']; ?></td>
             <td><?php echo $row['invoice_number']; ?></td>
             <td><?php echo $row['date_order']; ?></td>
             <td><?php echo $row['suplier']; ?></td>
             <td><?php echo $row['date_deliver']; ?></td>

             <td class = "hidden"><?php echo $row['p_name']; ?></td>

             <td><?php
               $rrrrrrr=$row['p_name'];
               $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
               $resultss->bindParam(':asas', $rrrrrrr);
               $resultss->execute();
               for($i=0; $rowss = $resultss->fetch(); $i++){
                echo $rowss['product_name'];
              }
              ?></td>

             <td><?php
               $rrrrrrr=$row['p_name'];
               $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
               $resultss->bindParam(':asas', $rrrrrrr);
               $resultss->execute();
               for($i=0; $rowss = $resultss->fetch(); $i++){
                echo $rowss['description_name'];
              }
              ?></td>
              
              <td><?php echo $row['qty']; ?></td>
              <td><?php
                $dsdsd=$row['cost'];
                echo formatMoney($dsdsd, true);
                ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><a href="#" id="<?php echo $row['transaction_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete">
                <span><i class="fa fa-trash"></i></span>
                </a> 
                <a rel="facebox" class = "btn btn-success"  href="stockin.php?name=<?php echo $row['p_name']; ?>&iv=<?php echo $row['invoice_number']; ?>&qty=<?php echo $row['qty']; ?>&date=<?php echo $row['date_order']; ?>&tid=<?php echo $row['transaction_id']; ?>"">
                <span><i class="fa fa-plus"></i></span>
                </a>

                <a class = "btn btn-primary"  href="printpo.php?id=<?php echo $row['invoice_number']; ?>&supplier=<?php echo $row['suplier']; ?>"><span><i class="fa fa-print"></i></span></a> 
                </td>
              </tr>
              <?php
            }
            ?>

          </tbody>
        </table>
        <div class="clearfix"></div>
      </div>
      <script src="js/jquery.js"></script>
      <script type="text/javascript">
       $(function() {


        $(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
if(confirm("Sure you want to delete this update? There is NO undo!"))
{

	$.ajax({
		type: "GET",
		url: "deletepppp.php",
		data: info,
		success: function(){

		}
	});
	$(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
	.animate({ opacity: "hide" }, "slow");

}

return false;

});

      });
    </script>

  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>


<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
  $(document).ready(function() {
   $('#dataTables-example').DataTable({
    responsive: true
  });
 });
</script>




</body>

</html>
