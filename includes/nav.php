<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">CMS HOME</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="contact.php">Contact</a>
                    </li> 

                    <?php // navCategoryDisplay();     // Display Nav Category Alphabetically ?>
                    
                    <?php
                        if(isset($_SESSION['user_role'])) {
                            // if ($_SESSION['user_role'] == "admin") {
                                if (isset($_GET['p_id'])) {
                                    $post_id = $_GET['p_id'];
                                    echo "<li>";
                                        echo "<a href='admin/posts.php?source=edit_post&post_id={$post_id}'>Edit Post</a>";
                                    echo "</li>";
                                }
                                echo "<li>";
                                    echo "<a href='admin/'>Admin</a>";
                                echo "</li>";
                            // }   
                        }


                    ?>




                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>