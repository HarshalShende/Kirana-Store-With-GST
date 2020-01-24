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
                    <h1 class="page-header">Collection Report</h1>
                </div>
                <div id="maintable"><div style="margin-top: -19px; margin-bottom: 21px;">
                </div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th > Transaction ID </th>
                                <th > Date </th>
                                <th > Customer Name </th>
                                <th > Invoice Number </th>
                                <th > Amount Paid </th>
                                <th > Remarks </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include('connect.php');
                            $result = $db->prepare("SELECT * FROM collection ");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td>CTI-000<?php echo $row['transaction_id']; ?></td>
                                    <td>
                                        <?php echo $row['date']; ?>
                                    </td>
                                    <td><?php
                                    $rrrrrrr=$row['name'];
                                     $resultss = $db->prepare("SELECT * FROM sales WHERE invoice_number= :asas");
                                     $resultss->bindParam(':asas', $rrrrrrr);
                                     $resultss->execute();
                                     for($i=0; $rowss = $resultss->fetch(); $i++){
                                        echo $rowss['name'];
                                    }
                                    ?></td>
                                    <td>
                                        <?php echo $row['invoice']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $dsdsd=$row['amount'];
                                        echo formatMoney($dsdsd, true);
                                        ?>     
                                    </td>
                                    <td>
                                        <?php echo $row['remarks']; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                            <thead>
                                <tr>
                                    <th colspan="4" style="border-top:1px solid #999999"> Total </th>
                                    <th colspan="2" style="border-top:1px solid #999999"> 
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
                                       
                                        $results = $db->prepare("SELECT sum(amount) FROM collection ");
                                     
                                        $results->execute();
                                        for($i=0; $rows = $results->fetch(); $i++){
                                            $dsdsd=$rows['sum(amount)'];
                                            echo formatMoney($dsdsd, true);
                                        }
                                        ?>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>
                    <div class="clearfix"></div>
                </div>

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
                function print() {
                    window.print();
                }
            </script>


</body>

</html>
