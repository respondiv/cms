<?php include "includes/header.php"             /* Include Header */ ?> 
<?php include "includes/nav.php"                /* Include Navigation */ ?> 
        

        <div id="page-wrapper">

            <div class="container-fluid">
                
                <div class="row">
                    <h1 class="page-header">
                        Dashboard
                        <small>Welcome: <?php echo $_SESSION['user_firstname'] ?>!</small>
                    </h1>
                </div>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                  <div class='huge'><?php echo countAll('posts'); ?></div>
                                        <div>Total Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     <div class='huge'><?php echo countAll('comments'); ?></div>
                                      <div>Total Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo countAll('categories'); ?></div>
                                         <div>Total Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo countAll('users'); ?></div>
                                        <div>Total Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>   
                
                </div>
                <!-- /.row 1 -->

                <div class="row">
                    <!-- Google Charts -->
                    <script type="text/javascript" src="//www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['', 'Posts', 'Comments', 'Users'],

                            <?php 
                                $published_posts = countPostsByStatus('published');
                                $draft_posts = countPostsByStatus('draft');
                                $comments_approved = countApprovedComments('approved');
                                $comments_decline = countApprovedComments('decline');
                                $user_approved = countApprovedUsers('approved');
                                $user_declined = countApprovedUsers('declined');

                        
                              echo "['Approved/Published', $published_posts, $comments_approved, $user_approved ],";
                              echo "['Draft/Decline', $draft_posts, $comments_decline, $user_declined ],";

                              ?>
                        ]);

                        var options = {
                          chart: {
                            title: 'CMS Overview Details',
                            subtitle: '',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, options);
                      }
                    </script>
                    <div class="col-md-12">
                        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                    </div>
                </div>
                <!-- /.row 2 -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php"                /* Include footer */ ?> 
