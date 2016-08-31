<?php include "includes/header.php"             /* Include Header */ ?> 
<?php include "includes/nav.php"                /* Include Navigation */ ?> 
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Categories:
                            <small> Here you can View, Add, Update and Delete Categories</small>
                        </h3>

                        <!-- Add / Update Category Form  -->
                        <div class="col-sm-6 bottom10-m">
                            <?php addCategories(); // Add Categories ?>

                            <!-- Add Category Form -->
                            <h3>Add a Category</h3>
                            <form class="top3" action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Enter a New Category Name</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>      
                            </form>

                            <?php if (isset($_GET['edit'])) { // only display update category form when user click Edit link ?>

                                    <!-- Update Category Form -->
                                    <h3 class="top5">Edit Category</h3>
                                    <form class="top3" action="" method="post">
                                        <div class="form-group">
                                            <label for="cat-title">Enter your Edits</label>
                                            <?php updateCategory(); // Update Categories ?>
                                            <input type="text" class="form-control" name="cat_title_update" value="<?php echo $cat_title; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                                        </div>      
                                    </form>

                            <?php } ?>
                        </div>



                        <!-- Display Categories List with Edit and Delete button -->
                        <div class="col-sm-6">
                            <h3>Categories List</h3>
                            <table class="table table-striped table-bordered table-hover top3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php viewCategories(); // Display all categories ?>                                     
                                    <?php deleteCategory(); // Delete all categories?>
                                </tbody>
                            </table>
                        </div>
                        
                        

                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php"                /* Include footer */ ?> 
