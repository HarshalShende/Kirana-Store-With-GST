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


    <?php include('navfixed.php');?>    

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sales Report</h1>
                </div>
                <div id="maintable">
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th > Transaction ID </th>
                                <th > Date </th>
                                <th > Customer Name </th>
                                <th > Invoice Number </th>
                                <th > Type of Payment </th>
                                <th > Total Sales </th>
                                <th > Balance </th>
                                <th > Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include('connect.php');
                            $result = $db->prepare("SELECT * FROM sales ORDER BY transaction_id");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                <tr class="record">
                                    <td>STI-000<?php echo $row['transaction_id']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['invoice_number']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php
                                        $dsdsd=$row['amount'];
                                        echo formatMoney($dsdsd, true);
                                        ?>
                                    </td>
                                    <td><?php
                                        $d=$row['balance'];
                                        echo formatMoney($d, true);
                                        ?>
                                    </td>
                                    <td>
                                        <a href="#" id="<?php echo $row['transaction_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete">
                                            <span><i class="fa fa-trash"></i></span>
                                        </a>
                                        &nbsp;
                                        <a class="btn btn-primary" href="salesprint.php?id=<?php echo $row['invoice_number']; ?>">
                                            <span><i class="fa fa-print"></i></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="5" style="border-top:1px solid #999999"> Total Amount </th>
                                <th colspan="4" style="border-top:1px solid #999999"> 
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
                                    $results = $db->prepare("SELECT sum(amount) FROM sales ");
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
                            <th colspan="5" style="border-top:1px solid #999999" >Total balance </th>
                              <th colspan="1" style="border-top:1px solid #999999">
                                  <th colspan="2" style="border-top:1px solid #999999"> 
                                     <?php
                                     $results = $db->prepare("SELECT sum(balance) FROM sales ");
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

                    <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>
                </div>
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
   url: "deletesales.php",
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
