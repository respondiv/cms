                        <h3 class="page-header">
                            View Comments:
                            <small> Here you can View All COmments</small>
                        </h3>
                        <!-- Display All Posts -->
                        <?php
                            if (isset($_GET['commentsDelete'])){
                                echo "<div class='alert alert-success'>";
                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                echo "Comments Deleted";
                                echo "</div>";
                            }
                            if (isset($_GET['commentsDecline'])){
                                echo "<div class='alert alert-success'>";
                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                echo "Comments Declined";
                                echo "</div>";
                            }
                            if (isset($_GET['commentsApproved'])){
                                echo "<div class='alert alert-success'>";
                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                echo "Comments Approved";
                                echo "</div>";
                            }

                            // enable bulk comments options
                            allCommentsCheckBoxes();

                        ?>
                        <form action="" method="post">
                            <table class="table table-striped table-bordered table-hover top1">

                                <div id="bulkOptionsContainer" class="col-xs-3 hide-m">
                                
                                    <select class="form-control" name="bulk_options" id="">
                                        <option value="" selected>Select Options</option>
                                        <option value="approved" >Approve</option>
                                        <option value="decline" >Decline</option>
                                        <option value="delete" >Delete</option>
                                    </select>
                                </div>

                                <div class="col-sx-3">
                                    <input type="submit" name="bulkCommentSubmit" class="btn btn-success hide-m" value="Apply">
                                </div>

                                <thead>
                                    <tr>
                                        <th class='hide-m'><input id="selectAllBoxes" type="checkbox"></th>
                                        <th class='hide-m'>ID</th>
                                        <th>Comment in Post</th>
                                        <th>Comments</th>
                                        <th class='hide-m'>Name</th>
                                        <th class='hide-m'>Email</th>
                                        <th>Status</th>
                                        <th class='hide-m'>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php viewAllComments();       //Display all comments ?>
                                    <?php deleteComments();     // Delete selected comments ?>
                                    <?php approveDeclineComments();     // Approve / Decline selected comments ?>
                                </tbody>
                            </table> 
                        </form>
                        <?php include("delete_modal.php"); ?>
                        <?php myPaginationComments();     // display Pagination ?>