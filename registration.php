<?php include "includes/header.php"             /* Include Header */ ?> 
<?php include "includes/nav.php"                /* Include Navigation */ ?> 

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <section id="login">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="form-wrap">
                            <h1>Register</h1>
                                <form role="form" action="" method="post" id="login-form" autocomplete="off" data-toggle="validator">
                                    <div class="form-group">
                                        <label for="username" class="sr-only">username</label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" data-error="Bruh, that email address is invalid" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                            
                                    <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                                </form>
                             
                            </div>
                        </div> <!-- /.col-xs-12 -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </section>

        </div>
        <!-- /.row -->

        <hr>
        
<?php include "includes/footer.php"                     /* Include footer */ ?> 
        
