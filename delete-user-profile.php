<?php

include('./config/constant.php');

if(isset($_GET['id']) && isset($_GET['user_image'])) {
    $id = $_GET['id'];
    $user_image = $_GET['user_image'];

    if($user_image != "") {
        $path = "./images/user/" . $user_image;

        if(file_exists($path)) {
            $remove = unlink($path);

            if($remove == FALSE) {
                $_SESSION['remove'] = "<div class='notice-text-failed'>Failed to Remove User Image</div>";
                header('location:' . SITEURL . 'profile.php?user_id=' . $id);
                die();
            }
        } else {
            $_SESSION['remove'] = "<div class='notice-text-failed'>Image file does not exist: $path</div>";
            header('location:' . SITEURL . 'profile.php?user_id=' . $id);
            die();
        }
    }

    $sql = "UPDATE user SET user_image='' WHERE uid = '$id'";
    $res = mysqli_query($conn, $sql);

    if($res == TRUE) {
        $_SESSION['delete'] = "<div class='notice-text-success'>Profile Image Deleted Successfully</div>";
    } else {
        $_SESSION['delete'] = "<div class='notice-text-failed'>Failed to Delete Profile Image, Try Again Later</div>";
    }

    header('location:' . SITEURL . 'profile.php?user_id=' . $id);
} else {
    header('location:' . SITEURL . 'profile.php?user_id=' . $id);
}