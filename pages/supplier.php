<?php include('auth.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kirana Store With GST</title>

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
            loadingImage: 'src/loading.gif',
            closeImage: 'src/closelabel.png'
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
                        <div class="modal fade" id="adds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form action="savesupplier.php" method="post" class="form-group"
                                            enctype="multipart/form-data">
                                            <div id="ac">
                                                <span>Supplier Agency : </span><input type="text" name="name"
                                                    class="form-control" />
                                                <span>Contact Person : </span><input type="text" name="cperson"
                                                    class="form-control" />
                                                <span>Address : </span><input type="text" name="address"
                                                    class="form-control" />
                                                <span>Contact : </span><input type="text" name="contact"
                                                    class="form-control" />
                                                <!-- <span>GSTIN Number:<small>&nbsp;&nbsp;e.g. 36ARVPS3698F1ZF</small></span> -->
                                                <input type="hidden" name="gstin" class="form-control" placeholder="" value="36ARVPS3698F1ZF"/>
                                                <span>State:</span>
                                                <select name="state" class="form-control">
                                                    <option value="">------------Select State------------</option>
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Orissa">Orissa</option>
                                                    <option value="Pondicherry">Pondicherry</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttaranchal">Uttaranchal</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>
                                                <span>Upload Image:</span> <input type="file" id="image" name="image"
                                                    class="form-control">
                                                <span>&nbsp;</span><input class="btn btn-primary btn-block"
                                                    name="insert" id="insert" type="submit" value="save"
                                                    class="form-control" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            data-dismiss="modal">Close</button>
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
                                <th>Image</th>
                                <th> Supplier </th>
                                <th> Contact Person </th>
                                <th> Address </th>
                                <th> Contact </th>
                                <!-- <th> GSTIN </th> -->
                                <th> State </th>
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
                                <?php
                                echo '
                                <td>
                                    <img src="images/supplierimage/'.($row['images'] ).'" height="100" width="100"/>
                                </td>
                                ';
                                ?>
                                <td><?php echo $row['suplier_name']; ?></td>
                                <td><?php echo $row['contact_person']; ?></td>
                                <td><?php echo $row['suplier_address']; ?></td>
                                <td ><?php echo $row['suplier_contact']; ?></td>
                                
                                <td><?php echo $row['states']; ?></td>
                                <td><a rel="facebox" class="btn btn-primary"
                                        href="editsupplier.php?id=<?php echo $row['suplier_id']; ?>"> <i
                                            class="fa fa-pencil"></i> </a> <a href="#"
                                        id="<?php echo $row['suplier_id']; ?>" class="btn btn-danger delbutton"
                                        title="Click To Delete"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <?php
                        }
                        ?> 
                        <!-- plaste it in above empty line  -->
                        <!-- <td ><?php echo $row['gstin']; ?></td> -->

                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
                <script src="js/jquery.js"></script>
                <script type="text/javascript">
                $(function() {


                    $(".delbutton").click(function() {

                        //Save the link in a variable called element
                        var element = $(this);

                        //Find the id of the link that was clicked
                        var del_id = element.attr("id");

                        //Built a url to send
                        var info = 'id=' + del_id;
                        if (confirm("Sure you want to delete this update? There is NO undo!")) {

                            $.ajax({
                                type: "GET",
                                url: "deletesupplier.php",
                                data: info,
                                success: function() {

                                }
                            });
                            $(this).parents(".record").animate({
                                    backgroundColor: "#fbc7c7"
                                }, "fast")
                                .animate({
                                    opacity: "hide"
                                }, "slow");

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