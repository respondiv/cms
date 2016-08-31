						<?php addUsers();       //Add posts ?>
						<h3 class="page-header">
                            Add Users:
                            <small> Here you can Add new Users</small>
                        </h3>
						<!-- Form to Add Users -->
                        <form action="" method="post" enctype="multipart/form-data">    
     
							<div class="form-group">
								<label for="user_status">User Status</label>
								<select name="user_status" id="">
									<option value="approved">Approve</option>
									<option value="declined">Decline</option>
								</select>
							</div>

							<div class="form-group">
								<label for="username">User Name</label>
								<input type="text" class="form-control" name="username">
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password">
							</div>

							<div class="form-group">
								<label for="user_firstname">First Name</label>
								<input type="text" class="form-control" name="user_firstname">
							</div>

							<div class="form-group">
								<label for="user_lastname">Last Name</label>
								<input type="text" class="form-control" name="user_lastname">
							</div>

							<div class="form-group">
								<label for="user_email">Email</label>
								<input type="email" class="form-control" name="user_email">
							</div>

							<div class="form-group">
								<label for="user_role">Role</label>
								<select name="user_role" id="">
									<option value="admin"> Admin</option>
									<option value="subscriber"> Subscriber</option>
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
								<label for="user_image">User Image</label>
								<input type="file"  name="user_image">
							</div>

							<div class="form-group">
								<input class="btn btn-primary" type="submit" name="create_users" value="Add User">
							</div>


						</form>