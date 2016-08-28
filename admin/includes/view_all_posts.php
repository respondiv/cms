                        <h3 class="page-header">
                            View Posts:
                            <small> Here you can View All Posts</small>
                        </h3>
                        <!-- Display All Posts -->
                        <?php
                        //  Post Delete Message
                        if (isset($_GET['postDeleteResult'])){
                                echo "<div class='alert alert-success'>";
                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                echo "Post Successfully Deleted";
                                echo "</div>";
                            }

                        // enable bulk post options
                        allPostsCheckBoxes();

                        ?>
                        <form action="" method="post">
                            <table class="table table-striped table-bordered table-hover top1">

                                <div id="bulkOptionsContainer" class="col-xs-3 hide-m">
                                
                                    <select class="form-control" name="bulk_options" id="">
                                        <option value="" selected>Select Options</option>
                                        <option value="published" >Publish</option>
                                        <option value="draft" >Draft</option>
                                        <option value="copy" >Duplicate</option>
                                        <option value="delete" >Delete</option>
                                    </select>
                                </div>

                                <div class="col-sx-3">
                                    <input type="submit" name="bulkPostSubmit" class="btn btn-success hide-m" value="Apply">
                                    <a class="btn btn-primary" href="posts.php?source=add_post">Add New Post</a>

                                </div>
                            
                                <thead>
                                    <tr>
                                        <th class='hide-m'><input id="selectAllBoxes" type="checkbox"></th>
                                        <th class='hide-m'>ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th class='hide-m'>Category</th>
                                        <th class='hide-m'>Image</th>
                                        <!-- <th class='hide-m'>Post Excerpt</th> -->
                                        <th class='hide-m'>Tags</th>
                                        <th class='hide-m'>Publish Date</th>
                                        <th>Status</th>
                                        <th class='hide-m'>Comments</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php viewPosts();       //Display all posts ?>
                                    <?php deletePosts();     // Delete selected posts ?>
                                </tbody>
                            </table>
                        </form> 