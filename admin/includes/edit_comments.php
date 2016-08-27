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

						  	if (isset($_GET['commentsEdited'])){
                                echo "<div class='alert alert-success'>";
                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                echo "Comment Updated Successfully";
                                echo "</div>";
                            }



					    ?>

						<h3 class="page-header">
                            Edit Comments:
                            <small> Here you can Edit your comments</small>
                        </h3>
						<!-- Form to Edit comments -->

						<div class="row">
							<div class="bottom1">
								<a href='comments.php' class="btn btn-sm btn-info"> Edit More Comments</a>
							</div>
						</div>
						<div class="row">
						<div class="well">
		                    <form role="form" action="" method="post" data-toggle="validator">
		                        <div class="form-group">
		                        <label for="comment_author">Name</label>
		                            <input type="text" class="form-control" name="comment_author" value="<?php echo $comment_author ?>" required>
		                            <div class="help-block with-errors"></div>
		                        </div>
		                        <div class="form-group">
		                            <label for="comment_email">Email</label>
		                            <input type="email" class="form-control" name="comment_email" data-error="Bruh, that email address is invalid" value="<?php echo $comment_email ?>" required>
		                            <div class="help-block with-errors"></div>
		                        </div>
		                        <div class="form-group">
		                            <label for="comment_content">Comments</label>
		                            <textarea class="form-control" rows="3" name="comment_content" required><?php echo $comment_content ?></textarea>
		                            <div class="help-block with-errors"></div>
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
	              	  </div>
