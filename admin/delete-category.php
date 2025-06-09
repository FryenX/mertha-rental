<?php

include('../config/constant.php');

if(isset($_GET['id']) && isset($_GET['category_image'])) {
    $id = $_GET['id'];
    $category_image = $_GET['category_image'];

    if($category_image != "") {
        $path = "../images/category/" . $category_image;

        if(file_exists($path)) {
            $remove = unlink($path);

            if($remove == FALSE) {
                $_SESSION['remove'] = "<div class='notice-text-failed'>Failed to Remove Category Image</div>";
                header('location:' . SITEURL . 'admin/manage-categories.php');
                die();
            }
        } else {
            $_SESSION['remove'] = "<div class='notice-text-failed'>Image file does not exist: $path</div>";
            header('location:' . SITEURL . 'admin/manage-categories.php');
            die();
        }
    }

    $sql = "DELETE FROM categories WHERE category_id=$id";
    $res = mysqli_query($conn, $sql);

    if($res == TRUE) {
        $_SESSION['delete'] = "<div class='notice-text-success'>Category Deleted Successfully</div>";
    } else {
        $_SESSION['delete'] = "<div class='notice-text-failed'>Failed to Delete Category, Try Again Later</div>";
    }

    header('location:' . SITEURL . 'admin/manage-categories.php');
} else {
    header('location:' . SITEURL . 'admin/manage-categories.php');
}

