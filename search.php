<?php include "includes/header.php"             /* Include Header */ ?> 
<?php include "includes/nav.php"                /* Include Navigation */ ?> 


    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h3 class="page-header">
                    Search Results:
                </h3>

                    <?php displaySearchResults();           // Display search results ?>

            </div>
            
            <?php include "includes/sidebar.php"                 /* Include sidebar */ ?> 
            

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"                     /* Include footer */ ?> 