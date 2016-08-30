                        <h3 class="page-header">
                            View Users:
                            <small> Here you can View All Users</small>
                        </h3>
                        <!-- Display All Posts -->
                        <?php
                            if (isset($_GET['userDeleteResult'])){
                                echo "<div class='alert alert-success'>";
                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                echo "User Deleted";
                                echo "</div>";
                            }
                            if (isset($_GET['userDeclinedResult'])){
                                echo "<div class='alert alert-success'>";
                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                echo "User Declined";
                                echo "</div>";
                            }
                            if (isset($_GET['userApprovedResult'])){
                                echo "<div class='alert alert-success'>";
                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                echo "User Approved";
                                echo "</div>";
                            }

                            // enable bulk user options
                            allUsersCheckBoxes();
                        ?>
                        
                        <form action="" method="post">

                            <table class="table table-striped table-bordered table-hover top1">

                                <div id="bulkOptionsContainer" class="col-xs-3 hide-m">
                                
                                    <select class="form-control" name="bulk_options" id="">
                                        <option value="" selected>Select Options</option>
                                        <option value="approved" >Approve</option>
                                        <option value="declined" >Decline</option>
                                        <option value="delete" >Delete</option>
                                    </select>
                                </div>

                                <div class="col-sx-3">
                                    <input type="submit" name="bulkUserSubmit" class="btn btn-success hide-m" value="Apply">
                                    <a class="btn btn-primary" href="users.php?source=add_users">Add New User</a>

                                </div>

                                <thead>
                                    <tr>
                                        <th class='hide-m'><input id="selectAllBoxes" type="checkbox"></th>
                                        <th class='hide-m'>ID</th>
                                        <th>Username</th>
                                        <th class='hide-m'>First Name</th>
                                        <th class='hide-m'>Last Name</th>
                                        <th>E-mail</th>
                                        <th class='hide-m'>Role</th>
                                        <th class='hide-m'>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php viewUsers();       //Display all Users ?>
                                    <?php deleteUsers();     // Delete selected Users ?>
                                    <?php approveDeclineUsers();     // Approve / Decline selected users ?>
                                </tbody>
                            </table> 
                        </form>
                        <?php include("delete_modal.php"); ?>
                        <?php myPaginationUsers();     // display Pagination ?>