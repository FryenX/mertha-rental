<?php

include('../config/constant.php');

if(isset($_GET['id']) && isset($_GET['brand_image'])) {
    $id = $_GET['id'];
    $brand_image = $_GET['brand_image'];

    if($brand_image != "") {
        $path = "../images/brand/" . $brand_image;

        if(file_exists($path)) {
            $remove = unlink($path);

            if($remove == FALSE) {
                $_SESSION['remove'] = "<div class='notice-text-failed'>Failed to Remove Brand Image</div>";
                header('location:' . SITEURL . 'admin/manage-brands.php');
                die();
            }
        } else {
            $_SESSION['remove'] = "<div class='notice-text-failed'>Image file does not exist: $path</div>";
            header('location:' . SITEURL . 'admin/manage-brands.php');
            die();
        }
    }

    $sql = "DELETE FROM brands WHERE brand_id=$id";
    $res = mysqli_query($conn, $sql);

    if($res == TRUE) {
        $_SESSION['delete'] = "<div class='notice-text-success'>Brand Deleted Successfully</div>";
    } else {
        $_SESSION['delete'] = "<div class='notice-text-failed'>Failed to Delete Brand, Try Again Later</div>";
    }

    header('location:' . SITEURL . 'admin/manage-brands.php');
} else {
    header('location:' . SITEURL . 'admin/manage-brands.php');
}

