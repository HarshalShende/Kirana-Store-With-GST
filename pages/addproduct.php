 <div class="panel-body">
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add Product</h4>
                </div>
            
                <div class="modal-body">
                    <form action="saveproduct.php" method="post" class = "form-group" enctype="multipart/form-data">
                        <div id="ac">
                            <span>Category: </span>
                            <select name="categ" class = "form-control" required="required" >
                            <?php
                                include('connect.php');
                                $result = $db->prepare("SELECT * FROM categories");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <option><?php echo $row['cat_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span>Product Code : </span><input type="text" required="required" name="code" value = "<?php echo $pcode ?>" class = "form-control" />
                            <span>Brand Name : </span><input type="text" required="required" name="bname" class = "form-control" />
                            <span>Description Name : </span><input type="text" required="required" name="dname" class = "form-control" />
                            <span>Product Unit : </span>
                            <select name="unit" class = "form-control" required="required" >
                            <option>Select Product Unit</option>
                            <option>Per Piece</option>
                            <option>Per Box</option>
                            <option>Per Pack</option>
                            <option>Per KG</option>
                            </select>
                            <span>Cost: </span><input type="text" name="cost" class = "form-control" required="required" />
                            <span>Simple Retail Price : </span><input type="text" name="price"  class = "form-control" required="required" />
                            <span>GST % :</span>
                            <!-- <input type="text" name="gst"  class = "form-control" required="required" /> -->
                            <select name="gst" class = "form-control" required="required" >
                            <option>Select GST percent(%)</option>
                            <option value="0">0 %</option>
                            <option value="5">5 %</option>
                            <option value="12">12 %</option>
                            <option value="18">18 %</option>
                            <option value="28">28 %</option>

                            </select>
                            <span>Supplier : </span>
                            <select name="supplier" class = "form-control required="required"">
                                <option value="">Select Suplier</option>
                                <?php
                                include('connect.php');
                                $result = $db->prepare("SELECT * FROM supliers");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                    <option><?php echo $row['suplier_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span>Quantity : </span><input type="text" name="qty" class = "form-control" required="required" />
                            <span>Date Delivered: </span><input type="date" name="date_del" class = "form-control" required="required" />
                            <span>Expiration Date: </span><input type="date" name="ex_date" class = "form-control" required="required"/>
                            <span>Upload Image:</span> <input type="file" id="image" name="image" class="form-control" required="required">
                            <span>&nbsp;</span><input class="btn btn-primary btn-block" id="insert" name="insert" type="submit" class = "form-control" value="Save" />
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
                        <!-- /.modal -->

                        <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  