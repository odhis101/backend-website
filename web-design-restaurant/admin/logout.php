

<?php
     //echo 'hello world';
    // 1. destroy the session 
    include('../config/constraints.php');
    session_destroy(); 
    //2. Redirect to login page
    header("Location:".HOMEURL."admin/login.php");
?>