<?php include('auth.php');?>
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
                    <h1 class="page-header">SUPPLIER</h1>
                </div>
                <div id="maintable">
                    <div style="margin-top: -19px; margin-bottom: 21px;">
                    </div>
                    <div class="panel-body">
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#adds">
                            Add Supplier
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="adds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
                                    </div>
                                    <div class="modal-body">

                                     <form action="savesupplier.php" method="post" class = "form-group">
                                        <div id="ac">
                                            <span>Supplier : </span><input type="text" name="name" class = "form-control" />
                                            <span>Contact Person : </span><input type="text" name="cperson" class = "form-control" />
                                            <span>Address : </span><input type="text" name="address" class = "form-control" />
                                            <span>Contact : </span><input type="text" name="contact" class = "form-control" />
                                            <span>&nbsp;</span><input class="btn btn-primary btn-block"  type="submit" value="save" class = "form-control" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th> Supplier </th>
                            <th> Contact Person </th>
                            <th> Address </th>
                            <th> Contact </th>
                            <th width="10%"> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM supliers ORDER BY suplier_id DESC");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record">
                                <td><?php echo $row['suplier_name']; ?></td>
                                <td><?php echo $row['contact_person']; ?></td>
                                <td><?php echo $row['suplier_address']; ?></td>
                                <td align="right"><?php echo $row['suplier_contact']; ?></td>
                                <td><a rel="facebox" class="btn btn-primary" href="editsupplier.php?id=<?php echo $row['suplier_id']; ?>"> <i class="fa fa-pencil"></i> </a>  <a href="#" id="<?php echo $row['suplier_id']; ?>" class="btn btn-danger delbutton" title="Click To Delete"><i class = "fa fa-trash"></i></a></td>
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
   url: "deletesupplier.php",
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
