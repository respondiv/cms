<?php include "includes/header.php"             /* Include Header */ ?> 
<?php include "includes/nav.php"                /* Include Navigation */ ?> 
<?php contactForm();                   /* Call registerUser funciton */ ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <?php if(!isset($_POST['contact_submit'])) { ?>

            <section id="login">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="form-wrap">
                            <h1>Contact US</h1>
                                <form role="form" action="" method="post" id="login-form" autocomplete="off" data-toggle="validator">
                                    <div class="form-group">
                                        <label for="name" class="sr-only">Your Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="email" class="sr-only">Your Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" data-error="Bruh, that email address is invalid" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="subject" class="sr-only">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="sr-only">Your Message</label>
                                        <textarea name="message" id="message" class="form-control" rows = "15" placeholder="Your Message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                            
                                    <input type="submit" name="contact_submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send">
                                </form>
                             
                            </div>
                        </div> <!-- /.col-xs-12 -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </section>
            <?php }
            else{ 
                echo "<div class='alert alert-success'>";
                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "<p>Thank you for Contacting US. We got your message and will get back to you shortly. </p>";
                    echo "<p>P.S: We have sent a confirmation email to your address.</p>";
                    echo "</div>";
                echo "<div class='row'>";
             } ?>

        </div>
        <!-- /.row -->

        <hr>
        
<?php include "includes/footer.php"                     /* Include footer */ ?> 
        
