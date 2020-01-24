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

    
    <link rel="stylesheet" type="text/css" media="print" href="print.css" />

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


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Inventory  Report</h1>
            </div>
            <div id="maintable"><div style="margin-top: -19px; margin-bottom: 21px;">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                    <thead>
                        <tr>

                            <th class="hidden"> Id </th>
                            <th width="10%"> Invoice </th>
                            <th> Product Code </th>
                            <th> Brand Name </th>
                            <th> Description Name </th>
                            <th> Quantity Start </th>
                            <th> Quantity Sold </th>
                            <th> Quantity End </th>
                            <th> Product Price </th>  
                            <th> Cost </th>
                            <th> Date Purchased </th>                               
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
                        $result = $db->prepare("SELECT *  FROM  sales_order ORDER BY transaction_id  ");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td class="hidden"><?php echo $row['transaction_id']; ?></td>
                                <td><?php echo $row['invoice']; ?></td>
                                <td><?php echo $row['product']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['dname']; ?></td>
                                <?php $qtyend=$row['qtyleft']+$row['qty'];?>
                                <td><?php echo $qtyend; ?></td>
                                <td><?php echo $row['qty']; ?></td>
                                <td><?php echo $row['qtyleft']; ?></td>
                                <td><?php
                                    $pprice=$row['price'];
                                    echo formatMoney($pprice, true);
                                    ?></td>
                                    <td><?php
                                        $pprice=$row['amount'];
                                        echo formatMoney($pprice, true);
                                        ?></td> 

                                        <td><?php echo $row['date']; ?></td> 

                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m " >
                            Print
                        </button>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <!-- /.row -->
            </div>

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>

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

        <script>
           function myFunction() {
               window.print();
           }
       </script>


   </body>

   </html>
