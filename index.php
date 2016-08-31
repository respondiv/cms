<?php include "includes/header.php"             /* Include Header */ ?> 
<?php include "includes/nav.php"                /* Include Navigation */ ?> 


    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    My First CMS
                    <small>Fully Custom Made</small>
                </h1>

                <?php displayAllPosts();               // Display ALl Posts ?> 

            </div>
            
            <?php include "includes/sidebar.php"                 /* Include sidebar */ ?> 
            

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"                     /* Include footer */ ?> 