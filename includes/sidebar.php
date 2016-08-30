<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

              <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <?php displaySearchForm(); ?>
                </div>
                


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                                <?php displayCategoryTwoColumn();     //  Display All Category Name in 2 Column on Sidebar  ?>
                               
                                                    </ul>
                                                </div>

                    </div>
                    <!-- /.row -->
                </div>


                <!-- Side Widget Well -->
                <div class="well">
                    <h4>About CMS</h4>
                    <p>This is About CMS section. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

                <!-- Blog Search Well -->
                <div class="well">
                    <?php displayLoginForm(); ?>
                </div>

                
                <?php 

                // if you want to add more widgets then it's better to separate them in widgets.php for code readibility.

                // include "includes/Widget.php"                /* Include widget */ 
                
                ?> 

            </div>