<div class="panel-body">
    <div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                </div>
            
                <div class="modal-body">
                    <form action="savecategory.php" method="post" class = "form-group" >
                        <div id="acat">
                       
                            <span>Enter Category Name: </span>
                            <input type="text" name="catname" required="required" value = "" class = "form-control" />

                            <span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Save" />
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