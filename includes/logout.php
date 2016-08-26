<?php

   // According to Shikchyak simple way 

    /*
    $_SESSION['user_id'] = null;
    $_SESSION['username'] = null;
    $_SESSION['user_password'] = null;
    $_SESSION['user_firstname'] = null;
    $_SESSION['user_lastname'] = null;
    $_SESSION['user_email'] = null;
    $_SESSION['user_role'] = null;
    $_SESSION['db_status'] = null;
    $_SESSION['user_image'] = null;*/


    // The best way to destroy session
    
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);


    header("Location: /");

?>