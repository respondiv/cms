<?php ob_start();?>
<?php include "db.php"                /* Include DB */ ?>
<?php session_start(); 			/* Start the Sesson */?>  
<?php include "../functions.php"                /* Include functions.php */ ?>

<?php

    if (isset($_POST['login_submit'])) {
         $username = $_POST['username'];
         $password = $_POST['password'];

         $username = mysqli_real_escape_string($connection,$username);
         $password = mysqli_real_escape_string($connection,$password);

         $query = "SELECT * FROM users WHERE username = '{$username}' ";
         $select_user_query = mysqli_query($connection, $query);

         // check the query
         querryCheck($select_user_query);

         while ($row = mysqli_fetch_assoc($select_user_query)) {
             $db_id = $row['user_id'];
             $db_firstname = $row['user_firstname'];
             $db_lastname = $row['user_lastname'];
             $db_user_role = $row['user_role'];
             $db_username = $row['username'];
             $db_password = $row['password'];
             $db_email = $row['user_email'];
             $db_status = $row['user_status'];
             $db_image = $row['user_image'];

         }

         if ($username !== $db_username || $password !== $db_password || $db_status !== "approved" || $db_user_role !== "admin") {
             header("Location: /");
         }
        /* elseif ($username == $db_username && $password == $db_password) {
            header("Location: ../admin/");
         }*/
         else{
         	$_SESSION['user_id'] = $db_id;
         	$_SESSION['username'] = $db_username;
            $_SESSION['user_password'] = $db_password;
         	$_SESSION['user_firstname'] = $db_firstname;
         	$_SESSION['user_lastname'] = $db_lastname;
         	$_SESSION['user_email'] = $db_email;
         	$_SESSION['user_role'] = $db_user_role;
         	$_SESSION['db_status'] = $db_status;
         	$_SESSION['user_image'] = $db_image;
         	
         	header("Location: ../admin/");
         }


     }
     else{
     	header("Location: /");
     } 
?>