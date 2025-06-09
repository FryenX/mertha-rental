<?php

    include('../config/constant.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM admins where admin_id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='notice-text-success'> Admin Deleted Successfully </div>";
        header('location:'.SITEURL.'admin/manage-admins.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='notice-text-failed'> Failed to Delete Admin, Try Again later </div>";
        header('location:'.SITEURL.'admin/manage-admins.php');
    }