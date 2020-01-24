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
    
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


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
                    <h1 class="page-header">Accounts Receivables Report</h1>
                </div>
            </div>
            <div id="maintable">
                <div style="margin-top: -19px; margin-bottom: 21px;">
                </div>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th > Invoice Number </th>
                            <th > Product Code </th>
                            <th > Brand Name </th>
                            <th > Description Name </th>
                            <th > Status </th>
                            <th > Remarks </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM purchases WHERE status= 'returned'");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">

                                <td><?php echo $row['invoice_number']; ?></td>
                                <td><?php echo $row['p_name']; ?></td>
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
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['remark']; ?></td>

                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>

            <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>
            <div class="clearfix"></div>
        </div>

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






</body>

</html>
