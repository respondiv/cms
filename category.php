<?php include "includes/header.php"             /* Include Header */ ?> 
<?php include "includes/nav.php"                /* Include Navigation */ ?> 


    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php displayPostsInCategory();               // Display All Posts in Category ?> 

            </div>
            
            <?php include "includes/sidebar.php"                 /* Include sidebar */ ?> 
            

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"                     /* Include footer */ ?> 