<?php 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = "<div class='notice-text-failed'>Please login before proceeding into admin panel</div>";

        header('location:'.SITEURL.'admin/login.php');
    }