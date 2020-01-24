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


  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">


  <!-- DataTables CSS -->
  <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

  <link rel="stylesheet" type="text/css" media="print" href="print.css" />


</head>

<body>


  <?php include('navfixed.php');?>    


  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Customer Transaction Records</h1>
        </div>

        <div class="content" id="content">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th > Customer Name </th>
                <th > Type Of  Payment </th>
                <th > Date of Transaction </th>
                <th > Amount Paid </th>
                <th > Balance </th>
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
                            //load database connection
              $host = "localhost";
              $user = "root";
              $password = "";
              $database_name = "inventory";
              $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ));
                            // Search from MySQL database table
              $search=$_POST['search'];
              $query = $pdo->prepare("select * from sales where name LIKE '%$search%' ");
              $query->bindValue(1, "%$search%", PDO::PARAM_STR);
              $query->execute();
                            // Display search result
              if (!$query->rowCount() == 0) {			
               while ($results = $query->fetch()) { 
                ?>
                <tr class="record">
                  <td><?php echo $results['name']; ?></td>
                  <td><?php echo $results['type']; ?></td>
                  <td><?php echo $results['date']; ?></td>
                  <td><?php
                    $dsdsd=$results['amount'];
                    echo formatMoney($dsdsd, true);
                    ?></td>
                    <td><?php
                    $dsdsd=$results['balance'];
                    echo formatMoney($dsdsd, true);
                    ?></td>
                  </tr>
                  <?php

                }
                ?>

              </tbody>
              <thead>
                <tr>
                  <th colspan="3" style="border-top:1px solid #999999" ><div class="pull-right">Total Amount</div> </th>
                  <th colspan="2" style="border-top:1px solid #999999"> 
                   <?php
                   $search=$_POST['search'];
                   $results = $pdo->prepare("SELECT sum(amount) FROM sales WHERE name=:search ");
                   $results->bindParam(':search', $search);
                   $results->execute();
                   for($i=0; $rows = $results->fetch(); $i++){
                    $dsdsd=$rows['sum(amount)'];
                    echo formatMoney($dsdsd, true);
                  }
                  ?>
                </th>
              </tr>
            </thead>
            <thead>
                <tr>
                  <th colspan="3" style="border-top:1px solid #999999" ><div class="pull-right">Total balance</div> </th>
                  <th colspan="1" style="border-top:1px solid #999999">
                  <th colspan="2" style="border-top:1px solid #999999"> 
                   <?php
                   $search=$_POST['search'];
                   $results = $pdo->prepare("SELECT sum(balance) FROM sales WHERE name=:search ");
                   $results->bindParam(':search', $search);
                   $results->execute();
                   for($i=0; $rows = $results->fetch(); $i++){
                    $dsdsd=$rows['sum(balance)'];
                    echo formatMoney($dsdsd, true);
                  }
                  ?>
                </th>
              </tr>
            </thead>  
          </table>
          <?php		
        } else {
          echo '<font style = "color:red"><h1>Nothing found</h1></font>';
        }
        ?>
      </div>
    </div>
  </div>
  <div class = "pull-right">

    <button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m " >
      Print
    </button>
  </div>
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
  function myFunction() {
    window.print();
  }
</script>

<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>


</body>
</html>