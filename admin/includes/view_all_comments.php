                        <h3 class="page-header">
                            View Comments:
                            <small> Here you can View All COmments</small>
                        </h3>
                        <!-- Display All Posts -->
                        <table class="table table-striped table-bordered table-hover top3">
                            <thead>
                                <tr>
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