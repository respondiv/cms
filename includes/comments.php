               <?php $current_post_id = currentPostID();   // get current post ID ?>
               <?php createNewComment();       // Create a comment ?>

                <?php
                    global $SuccessMessageForComments;
                    if ($SuccessMessageForComments == "Success") {
                ?>
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Your comments has been sent and is waiting for approval.</strong>
                    </div>
                 <?php } ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post" data-toggle="validator" id="commentform">
                        <div class="form-group">
                            <label for="comment_author">Name</label>
                            <input type="text" class="form-control" name="comment_author" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="comment_email">Email</label>
                            <input type="email" class="form-control" name="comment_email" data-error="Bruh, that email address is invalid" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="comment_content">Comments</label>
                            <textarea class="form-control" rows="3" name="comment_content" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="hidden" name="comment_post_id" value="<?php echo $current_post_id; ?> ">
                        <button type="submit" class="btn btn-primary" name="comment_submit">Submit</button>
                    </form>

                </div>
                


                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

                <?php displayComments()     // DIsplay comments ?>

<!-- 
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
 -->