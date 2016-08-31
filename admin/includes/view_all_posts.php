                        <h3 class="page-header">
                            View Posts:
                            <small> Here you can View All Posts</small>
                        </h3>
                        <!-- Display All Posts -->
                        <table class="table table-striped table-bordered table-hover top3">
                            <thead>
                                <tr>
                                    <th class='hide-m'>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th class='hide-m'>Category</th>
                                    <th class='hide-m'>Image</th>
                                    <th class='hide-m'>Post Excerpt</th>
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