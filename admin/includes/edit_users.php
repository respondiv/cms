						<?php

							// get current content / values of post from the DB using editUsersStep1() functions
	   						$get_values = editUsersStep1();
	   						$user_id = $get_values['user_id']; 
			                $username = $get_values['username']; 
			                $password = $get_values['password']; 
			                $user_firstname = $get_values['user_firstname']; 
			                $user_lastname = $get_values['user_lastname']; 
			                $user_image_current = $get_values['user_image']; 
			                $user_email = $get_values['user_email']; 
			                $user_role = $get_values['user_role'];
			                $user_status = $get_values['user_status'];
			                $user_randSalt = $get_values['user_randSalt'];

						  	// Update the existing post with the new values using editUsersStep2() functions
						  	editUsersStep2();


					    ?>

						<h3 class="page-header">
                            Edit Users:
                            <small> Here you can Edit your User Information</small>
                        </h3>

						<!-- Form to Edit Users -->
						<!-- Form to Add Users -->
                        <form action="" method="post" enctype="multipart/form-data">    
     
							<div class="form-group">
								<label for="user_status">User Status</label>
								<select name="user_status" id="">
									<?php if ($user_status == "approved"){ ?>
									<option value="approved" selected>Approve</option>
									<option value="declined">Decline</option>
									<?php } else { ?>
									<option value="approved">Approve</option>
									<option value="declined" selected>Decline</option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="username">User Name</label>
								<input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
							</div>

							<div class="form-group">
								<label for="user_firstname">First Name</label>
								<input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
							</div>

							<div class="form-group">
								<label for="user_lastname">Last Name</label>
								<input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
							</div>

							<div class="form-group">
								<label for="user_email">Email</label>
								<input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
							</div>

							<div class="form-group">
								<label for="user_role">Role</label>
								<select name="user_role" id="">
									<?php if ($user_role == "admin"){ ?>
									<option value="admin" selected> Admin</option>
									<option value="subscriber"> Subscriber</option>
									<?php } else { ?>
									<option value="admin"> Admin</option>
									<option value="subscriber" selected> Subscriber</option>
									<?php } ?>
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
								<p><img src="images/users/<?php echo $user_image_current; ?>" width="50em" /></p>
								<input type="file"  name="user_image">
							</div>

							<div class="form-group">
								<input class="btn btn-primary" type="submit" name="update_users" value="Update">
							</div>


						</form>