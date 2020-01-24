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

<?php
function Password() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$code='PO-'.Password();
?>

</head>

<body>

 <?php include('navfixed.php');?>

 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Purchase Order</h1>
            </div>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                <thead>
                    <tr>
                        <th class = "hidden">ID</th>
                        <th> Supplier </th>
                        <th> Order </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('connect.php');
                    $result = $db->prepare("SELECT * FROM supliers ORDER BY suplier_name");
                    $result->execute();
                    for($i=0; $row = $result->fetch(); $i++){
                        ?>
                        <tr class="record">
                            <td class = "hidden"><?php echo $row['suplier_id']; ?></td>
                            <td width="80%"><?php echo $row['suplier_name']; ?></td>
                            <td width="10%"><a class = "btn btn-primary" href="purchase.php?name=<?php echo $row['suplier_name']; ?>&invoice=<?php echo $code;?>"><span><i class = "fa fa-shopping-cart"></i></span></a> </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
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


</body>

</html>
