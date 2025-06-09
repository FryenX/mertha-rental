<?php 
    if(!isset($_SESSION['login-user']))
    {
        $_SESSION['no-login-message'] = "<div class='notice-text-failed'>Please login before renting in our website</div>";

        header('location:'.SITEURL.'login.php');
    }