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

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>


        <?php include('navfixed.php');?>    

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">CUSTOMER LEDGER</h1>
                    </div>
                    <div id="maintable">
                        <div style="margin-top: -19px; margin-bottom: 21px;">
                        </div>
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
                        $tftft=$_GET['cname'];
                        $resulta = $db->prepare("SELECT * FROM sales WHERE invoice_number= :a");
                        $resulta->bindParam(':a', $tftft);
                        $resulta->execute();
                        for($i=0; $rowa = $resulta->fetch(); $i++){
                            $name=$rowa['name'];
                            $amount=$rowa['total_amount'];
                            echo '<font style = "color:red"><h3>Due Date: '.$rowa['due_date'].'</h3></font><br> ';
                        }
                        $resultas = $db->prepare("SELECT * FROM customer WHERE customer_name= :b");
                        $resultas->bindParam(':b', $name);
                        $resultas->execute();
                        for($i=0; $rowas = $resultas->fetch(); $i++){
                            echo 'Name : '.$rowas['customer_name'].'<br>';
                            echo 'Address : '.$rowas['address'].'<br>';
                            echo 'Contact : '.$rowas['contact'].'<br>';
                        }
                        ?>
                        
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th> Transaction ID </th>
                                    <th> Date </th>
                                    <th> Invoice Number </th>
                                    <th> Payment </th>
                                    <th> Balance </th>
                                    <th> Total Ammount Due </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="record">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                     <td align="right"><?php
                                            $r=$amount;
                                            echo '<font style = color:red;>Php'.''.formatMoney($r, true).'</font>';
                                            ?></td>
                                </tr>
                                <?php
                                $tftft=$_GET['cname'];
                                $result = $db->prepare("SELECT * FROM collection WHERE name= :userid ORDER BY transaction_id ASC");
                                $result->bindParam(':userid', $tftft);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <tr class="record">
                                        <td>TR-000<?php echo $row['transaction_id']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['invoice']; ?></td>
                                         <td align="right"><?php
                                            $pprice=$row['amount'];
                                            echo 'Php'.''.formatMoney($pprice, true);
                                            ?></td>
                                        <td align="right"><?php
                                            $pprice=$row['balance'];
                                            echo formatMoney($pprice, true);
                                            ?></td>
                                        <td>&nbsp;</td>
                                        
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <a rel="facebox" id="addd" class="btn btn-primary" href="addledger.php?invoice=<?php echo $_GET['cname']; ?>&amount=<?php echo $amount; ?>" style="margin-top: 10px;">Add Payment</a><br><br>
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

    </body>

    </html>
