            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidenav">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="/admin/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-briefcase"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts" class="collapse">
                            <li>
                                <a href="posts.php"><i class="fa fa-fw fa-search"></i> View All Posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post"><i class="fa fa-fw fa-pencil"></i> Add Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-folder-open"></i> Categories</a>
                    </li>
                    <li>
                        <a href="comments.php"><i class="fa fa-fw fa-comment"></i> Comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="users.php"><i class="fa fa-fw fa-search"></i> View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_users"><i class="fa fa-fw fa-pencil"></i> Add New User</a>
                            </li>
                            <li>
                                <a href="posts.php?source=my_profile"><i class="fa fa-fw fa-user"></i> My Proflie</a>
                            </li>
                        </ul>
                    </li>                
                </ul>
            </div>