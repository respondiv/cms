<?php include "includes/header.php"             /* Include Header */ ?> 
<?php include "includes/nav.php"                /* Include Navigation */ ?> 
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                                            
                        <?php diffCrudInPosts();    // display dirrent pages / forms for CRUD depending upon user's interation is same page  ?>        
                                               
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php"                /* Include footer */ ?> 
