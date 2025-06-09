<?php

include('../config/constant.php');

if(isset($_GET['id']) && isset($_GET['admin_id'])) {
    $id = $_GET['id'];
    $admin_id = $_GET['admin_id'];

    $stmt = $conn->prepare("UPDATE orders SET status='1', admin_id=? WHERE order_id=?");
    $stmt->bind_param("ii", $admin_id, $id);

    $res = $stmt->execute();

    if($res == TRUE) {
        $_SESSION['confirm'] = "<div class='notice-text-success'>Order Updated Successfully</div>";
    } else {
        $_SESSION['confirm'] = "<div class='notice-text-failed'>Failed to Update Order, Try Again Later</div>";
    }

    $stmt->close();
    header('location:' . SITEURL . 'admin/manage-orders.php');
} else {
    header('location:' . SITEURL . 'admin/manage-orders.php');
}
