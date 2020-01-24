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
                <h1 class="page-header">Purchase Order Form</h1>
            </div>

            <form action="savepurchase.php" method="post" class = "form-group" name="purchase_order">
                <?php
                $today = date('Y-m-d');
                ?>
                <label>Date : </label><input type="text" class = "form-control" name="date" value = "<?php echo $today; ?>" />

                <label>Invoice Number : </label><input type="text" class = "form-control" name="invoice" value = "<?php echo $code; ?>" />

                <label>Supplier : </label><input type = "text" class = "form-control" name = "supplier" value = "<?php echo $_GET['name']; ?>">

                <label>Date Deliver : </label><input type="date" class = "form-control" name="date_delivered" />

                <input type="hidden" class = "form-control"  value="<?php echo $_GET['name']; ?>" />

                <label>Select a Product</label><br />
                <select name="product" style="width: 600px;" class="chzn-select">
                   <?php
                   include('connect.php');
                   $id =$_GET['name'];
                   $result = $db->prepare("SELECT * FROM products WHERE supplier = :supp");
                   $result->bindParam(':supp', $id);
                   $result->execute();
                   for($i=0; $row = $result->fetch(); $i++){
                    ?>
                    <option value="<?php echo $row['product_code']; ?>"><?php echo $row['product_name']; ?></option>
                    <?php
                }
                ?>
            </select><br />
            <label>Number of items </label>
            <input type="text" name="qty" class ="form-control" value="" placeholder="Qty" autocomplete="off" style="width: 68px; padding-top: 6px; padding-bottom: 6px; margin-right: 4px;" />
            <br />
            <!-- <button onclick="myFunction()" class="btn btn-primary" type="submit">Print PO</button> -->
            <button class="btn btn-primary" type="submit">Print PO</button>
        </form>
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

<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">
<script src="vendors/chosen.jquery.min.js"></script>
<script>
    $(function() {
        $(".chzn-select").chosen();

    });
</script>

<script type="text/javascript">
    jQuery(function(){
        $('[name="purchase_order"]').on('submit', function(e){
            e.preventDefault();
            var date = $('[name="date"]').val();
            var invoice = $('[name="invoice"]').val();
            var supplier = $('[name="supplier"]').val();
            var date_delivered = $('[name="date_delivered"]').val();
            var qty = $('[name="qty"]').val();
            var product = $('[name="product"]').val();

            // alert(date+' '+invoice+' '+supplier+' '+date_delivered+' '+qty+' '+product);
            var d_url = $(this).attr('action');
            $.ajax({
                type: 'POST',
                url: d_url,
                data: {
                    date:date,
                    invoice:invoice,
                    supplier:supplier,
                    date_delivered:date_delivered,
                    qty:qty,
                    product:product
                }
            })
            .done(function(data){
                alert('Saved');
                window.print();
            });
        });
    });
</script>

<script>
    // function myFunction() {
    //     window.print();
    // }
</script>


</body>

</html>