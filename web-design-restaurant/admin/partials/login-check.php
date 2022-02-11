<?php 
    //authorization -access control
    // check wether the user is logged in or not
    if(!isset($_SESSION['user'])){ // if user session is not set
        // user is not logged in 
        //redirect to login page with message
        $_SESSION['no-login-message']='<div class = "error">Please login to acces Control Panel </div>';
        header("Location:".HOMEURL."admin/login.php");
    }
?>