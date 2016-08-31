						<?php

							// get current content / values of post from the DB using editPostsStep1() functions
	   						$get_values = editPostsStep1();
	   						$post_id = $get_values['post_id'];
					        $post_status = $get_values['post_status'];
					        $post_title = $get_values['post_title'];
					        $post_content = $get_values['post_content'];
					        $post_category_id = $get_values['post_category_id'];
					        $post_author = $get_values['post_author'];
					        $post_tags = $get_values['post_tags'];
					        $post_image_current = $get_values['post_image_current'];
				         	$post_date = $get_values['post_date'];
				         	$post_comment_count = $get_values['post_comment_count'];

						  	// Update the existing post with the new values using editPostsStep2() functions
						  	editPostsStep2();


					    ?>

						<h3 class="page-header">
                            Edit Posts:
                            <small> Here you can Edit your Posts</small>
                        </h3>
						<!-- Form to Edit Post -->
                        <form action="" method="post" enctype="multipart/form-data">    
     
							<div class="form-group">
								<label for="post_status">Post Status</label>
								<select name="post_status" id="">
									<?php if ($post_status == "draft"){ ?>
									<option value="draft" selected>Draft</option>
									<option value="published">Published</option>
									<?php } else { ?>
									<option value="published" selected>Published</option>
									<option value="draft">Draft</option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="post_title">Post Title</label>
								<input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
							</div>

							<div class="form-group">
								<label for="post_content">Post Content</label>
								<textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>
								</textarea>
							</div>

							<div class="form-group">
								<label for="post_category_id">Post Category</label>
								<select name="post_category_id" id="">
									<?php selectCategories(); ?>
								</select>
							</div>
							
							<!-- <div class="form-group">
								<label for="post_author">Post Author</label>
								<select name="post_author" id="">
									<option value='' disabled selected> Select Post Author</option>
									<option value='Marry Jane'> Marry Jane</option>
									<option value='Sushil P.'> Sushil P.</option>
								</select>
							</div> -->

							<div class="form-group">
								<label for="post_author">Post Author</label>
								<input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
							</div>

							<div class="form-group">
								<label for="post_date">Post Date</label>
								<input type="date" class="form-control" name="post_date" value="<?php echo $post_date; ?>">
							</div>

							<div class="form-group">
								<label for="post_image">Post Image</label>
								<p><img src="../images/<?php echo $post_image_current; ?>" width="190em" /></p>
								<input type="file"  name="post_image">
							</div>

							<div class="form-group">
								<label for="post_tags">Post Tags</label>
								<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
							</div>

							<div class="form-group">
								<input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
							</div>


						</form>