<?php
include('../config/constant.php');

if(isset($_GET['id']) && isset($_GET['bike_image'])) {
    $id = $_GET['id'];
    $bike_image = $_GET['bike_image'];

    if(!empty($bike_image)) {
        $path = "../images/bikes/".$bike_image;
        if(file_exists($path)) {
            $remove = unlink($path);
            if(!$remove) {
                $_SESSION['remove'] = "<div class='notice-text-failed'>Failed to Remove Bike Image</div>";
                header('location:' . SITEURL . 'admin/manage-bikes.php');
                exit;
            }
        } else {
            $_SESSION['remove'] = "<div class='notice-text-failed'>Image file does not exist: $path</div>";
            header('location:' . SITEURL . 'admin/manage-bikes.php');
            exit;
        }
    }

    $sql = "DELETE FROM bikes WHERE bike_id=?";
    $stmt = $conn->prepare($sql);
    if($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if($stmt->affected_rows > 0) {
            $_SESSION['delete'] = "<div class='notice-text-success'>Bike Deleted Successfully</div>";
        } else {
            $_SESSION['delete'] = "<div class='notice-text-failed'>Failed to Delete Bike, Try Again Later</div>";
        }

        $stmt->close();
    } else {
        $_SESSION['delete'] = "<div class='notice-text-failed'>SQL Error: Failed to Prepare Query</div>";
    }

    header('location:' . SITEURL . 'admin/manage-bikes.php');
    exit;
} else {
    $_SESSION['delete'] = "<div class='notice-text-failed'>Invalid Access, Missing Parameters</div>";
    header('location:' . SITEURL . 'admin/manage-bikes.php');
    exit;
}
