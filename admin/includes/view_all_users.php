                        <h3 class="page-header">
                            View Users:
                            <small> Here you can View All Users</small>
                        </h3>
                        <!-- Display All Posts -->
                        <table class="table table-striped table-bordered table-hover top3">
                            <thead>
                                <tr>
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