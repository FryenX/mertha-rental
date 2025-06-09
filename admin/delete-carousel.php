<?php

include('../config/constant.php');

if(isset($_GET['id']) && isset($_GET['carousel_image'])) {
    $id = $_GET['id'];
    $carousel_image = $_GET['carousel_image'];

    if($carousel_image != "") {
        $path = "../images/carousel/" . $carousel_image;

        if(file_exists($path)) {
            $remove = unlink($path);

            if($remove == FALSE) {
                $_SESSION['remove'] = "<div class='notice-text-failed'>Failed to Remove Carousel Image</div>";
                header('location:' . SITEURL . 'admin/manage-carousel.php');
                die();
            }
        } else {
            $_SESSION['remove'] = "<div class='notice-text-failed'>Image file does not exist: $path</div>";
            header('location:' . SITEURL . 'admin/manage-carousel.php');
            die();
        }
    }

    $sql = "DELETE FROM carousel WHERE carousel_id=$id";
    $res = mysqli_query($conn, $sql);

    if($res == TRUE) {
        $_SESSION['delete'] = "<div class='notice-text-success'>Carousel Deleted Successfully</div>";
    } else {
        $_SESSION['delete'] = "<div class='notice-text-failed'>Failed to Delete Carousel, Try Again Later</div>";
    }

    header('location:' . SITEURL . 'admin/manage-carousel.php');
} else {
    header('location:' . SITEURL . 'admin/manage-carousel.php');
}

