    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add User</h4>
                </div>
                <div class="modal-body">


                    <form action="saveuser.php" method="post" class = "form-group" >
                        <div id="ac">
                            <span>USERNAME : </span><input type="text" name="user" class = "form-control" />
                            <span>PASSWORD: </span><input type="PASSWORD" name="pass" class = "form-control" />
                            <span>FULL NAME : </span><input type="text" name="name" class = "form-control" />
                            <span>POSITION: </span>
                            <select name = "post" class = "form-control">
                                <option>Cashier</option>
                            </select>    
                            <span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="save" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>