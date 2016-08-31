						<?php

							// get current content / values of comment from the DB using editcommentsStep1() functions
	   						$get_values = editCommentsStep1();
	   						$comment_id = $get_values['comment_id'];
					        $comment_status = $get_values['comment_status'];
					        $comment_content = $get_values['comment_content'];
					        $comment_author = $get_values['comment_author'];
					        $comment_email = $get_values['comment_email'];


						  	// Update the existing comment with the new values using editCommentsStep2() functions
						  	editCommentsStep2();


					    ?>

						<h3 class="page-header">
                            Edit Comments:
                            <small> Here you can Edit your comments</small>
                        </h3>
						<!-- Form to Edit comments -->

						<div class="well">
		                    <form role="form" action="" method="post">
		                        <div class="form-group">
		                        <label for="comment_author">Name</label>
		                            <input type="text" class="form-control" name="comment_author" value="<?php echo $comment_author ?>">
		                        </div>
		                        <div class="form-group">
		                            <label for="comment_email">Email</label>
		                            <input type="email" class="form-control" name="comment_email" value="<?php echo $comment_email ?>">
		                        </div>
		                        <div class="form-group">
		                            <label for="comment_content">Comments</label>
		                            <textarea class="form-control" rows="3" name="comment_content"><?php echo $comment_content ?></textarea>
		                        </div>
		                        <!-- <div class="form-group">
		                        									<label for="comment_status">Comment Status</label>
		                        									<select name="comment_status" id="">
		                        										<?php //if ($comment_status == "approved"){ ?>
		                        										<option value="approved" selected>Approve</option>
		                        										<option value="decline">Decline</option>
		                        										<?php// } else { ?>
		                        										<option value="decline" selected>Decline</option>
		                        										<option value="approved">Approve</option>
		                        										<?php //} ?>
		                        									</select>
		                        								</div> -->
		                        <button type="submit" class="btn btn-primary" name="update_comment">Update</button>
		                    </form>
	              	  </div>
