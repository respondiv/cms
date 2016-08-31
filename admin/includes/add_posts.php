						<?php addPosts();       //Add posts ?>
						<h3 class="page-header">
                            Add Posts:
                            <small> Here you can Add new Posts</small>
                        </h3>
						<!-- Form to Add Post -->
                        <form action="" method="post" enctype="multipart/form-data">    
     
							<div class="form-group">
								<label for="post_status">Post Status</label>
								<select name="post_status" id="">
									<option value="draft">Draft</option>
									<option value="published">Published</option>
								</select>
							</div>

							<div class="form-group">
								<label for="post_title">Post Title</label>
								<input type="text" class="form-control" name="post_title">
							</div>

							<div class="form-group">
								<label for="post_content">Post Content</label>
								<textarea class="form-control" name="post_content" id="" cols="30" rows="10">
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
								<input type="text" class="form-control" name="post_author">
							</div>

							<div class="form-group">
								<label for="post_date">Post Date</label>
								<input type="date" class="form-control" name="post_date">
							</div>

							<div class="form-group">
								<label for="post_image">Post Image</label>
								<input type="file"  name="post_image">
							</div>

							<div class="form-group">
								<label for="post_tags">Post Tags</label>
								<input type="text" class="form-control" name="post_tags">
							</div>

							<div class="form-group">
								<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
							</div>


						</form>