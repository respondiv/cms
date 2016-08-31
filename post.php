<?php include "includes/header.php"             /* Include Header */ ?> 
<?php include "includes/nav.php"                /* Include Navigation */ ?> 

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <?php displayPost();        // display post ?>

                <hr>
                <!-- Blog Comments -->
             
                <?php include 'includes/comments.php' ?>


            </div>

             <?php include "includes/sidebar.php"                 /* Include sidebar */ ?> 

        </div>
        <!-- /.row -->

        <hr>
        
<?php include "includes/footer.php"                     /* Include footer */ ?> 
        
