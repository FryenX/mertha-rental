<?php 
include('partials/header.php');


?>

<div class="container padding-top padding-content">
    <h1 class="padding-title text-center">Dashboard</h1>
    <div class="row">

    <?php 
    $sql_brand = "SELECT COUNT(brand_id) as brand_num FROM brands";
    
    $res_brand = mysqli_query($conn, $sql_brand);

    $count_brand = mysqli_num_rows($res_brand);
    
    if ($count_brand > 0)
    {
        while($row_brand = mysqli_fetch_assoc($res_brand))
            {
                $brand_num = $row_brand['brand_num'];
            }
            ?>
            <div class="col-3 mb-5">
                <div class="box rounded-4 text-center dashboard">
                    <div class="dashboard-text">
                        <h1><?php echo $brand_num ?></h1>
                        <p>Brands</p>
                    </div>
                </div>
            </div>
        <?php
    }
        
    ?>

    <?php 
        $sql_category = "SELECT COUNT(category_id) as category_num FROM categories";
        
        $res_category = mysqli_query($conn, $sql_category);

        $count_category = mysqli_num_rows($res_category);
        
        if ($count_category > 0)
        {
            while($row_category = mysqli_fetch_assoc($res_category))
                {
                    $category_num = $row_category['category_num'];
                }
                ?>
            <div class="col-3 mb-5">
                <div class="box rounded-4 text-center dashboard">
                    <div class="dashboard-text">
                        <h1><?php echo $category_num ?></h1>
                        <p>Category</p>
                    </div>
                </div>
            </div>
        <?php
        }
        
    ?>


    <?php 
        $sql_bike = "SELECT COUNT(bike_id) as bike_num FROM bikes";
        
        $res_bike = mysqli_query($conn, $sql_bike);

        $count_bike = mysqli_num_rows($res_bike);
        
        if ($count_bike > 0)
        {
            while($row_bike = mysqli_fetch_assoc($res_bike))
                {
                    $bike_num = $row_bike['bike_num'];
                }
                ?>
            <div class="col-3 mb-5">
                <div class="box rounded-4 text-center dashboard">
                    <div class="dashboard-text">
                        <h1><?php echo $bike_num ?></h1>
                        <p>Bikes</p>
                    </div>
                </div>
            </div>
        <?php
        }
        
    ?>

    <?php 
        $sql_paid= "SELECT COUNT(order_id) as paid_num FROM orders where status = 1";
        
        $res_paid = mysqli_query($conn, $sql_paid);

        $count_paid = mysqli_num_rows($res_paid);
        
        if ($count_category > 0)
        {
            while($row_paid = mysqli_fetch_assoc($res_paid))
                {
                    $paid_num = $row_paid['paid_num'];
                }
                ?>
            <div class="col-3 mb-5">
                <div class="box rounded-4 text-center dashboard">
                    <div class="dashboard-text">
                        <h1><?php echo $paid_num ?></h1>
                        <p>Paid Order</p>
                    </div>
                </div>
            </div>
        <?php
        }
        
    ?>

    <?php 
        $sql_unpaid = "SELECT COUNT(order_id) as unpaid_num FROM orders where status = 0";
        
        $res_unpaid = mysqli_query($conn, $sql_unpaid);

        $count_unpaid = mysqli_num_rows($res_unpaid);
        
        if ($count_unpaid > 0)
        {
            while($row_unpaid = mysqli_fetch_assoc($res_unpaid))
                {
                    $unpaid_num = $row_unpaid['unpaid_num'];
                }
                ?>
            <div class="col-3 mb-5">
                <div class="box rounded-4 text-center dashboard">
                    <div class="dashboard-text">
                        <h1><?php echo $unpaid_num ?></h1>
                        <p>Unpaid Order</p>
                    </div>
                </div>
            </div>
        <?php
        }
        
    ?>

    <?php 
        $sql_user = "SELECT COUNT(user_id) as user_num FROM user ";
        
        $res_user = mysqli_query($conn, $sql_user);

        $count_user = mysqli_num_rows($res_user);
        
        if ($count_user > 0)
        {
            while($row_user = mysqli_fetch_assoc($res_user))
                {
                    $user_num = $row_user['user_num'];
                }
                ?>
            <div class="col-3 mb-5">
                <div class="box rounded-4 text-center dashboard">
                    <div class="dashboard-text">
                        <h1><?php echo $user_num ?></h1>
                        <p>User</p>
                    </div>
                </div>
            </div>
        <?php
        }
        
    ?>
        <?php 
        $sql_admin = "SELECT COUNT(admin_id) as admin_num FROM admins ";
        
        $res_admin = mysqli_query($conn, $sql_admin);

        $count_admin = mysqli_num_rows($res_admin);
        
        if ($count_admin > 0)
        {
            while($row_admin = mysqli_fetch_assoc($res_admin))
                {
                    $admin_num = $row_admin['admin_num'];
                }
                ?>
            <div class="col-3 mb-5">
                <div class="box rounded-4 text-center dashboard">
                    <div class="dashboard-text">
                        <h1><?php echo $admin_num ?></h1>
                        <p>Admin</p>
                    </div>
                </div>
            </div>
        <?php
        }
        
    ?>
    <?php 
        $sql_carousel = "SELECT COUNT(carousel_id) as carousel_num FROM carousel ";
        
        $res_carousel = mysqli_query($conn, $sql_carousel);

        $count_carousel = mysqli_num_rows($res_carousel);
        
        if ($count_carousel > 0)
        {
            while($row_carousel = mysqli_fetch_assoc($res_carousel))
                {
                    $carousel_num = $row_carousel['carousel_num'];
                }
                ?>
            <div class="col-3 mb-5">
                <div class="box rounded-4 text-center dashboard">
                    <div class="dashboard-text">
                        <h1><?php echo $carousel_num ?></h1>
                        <p>carousel</p>
                    </div>
                </div>
            </div>
        <?php
        }
        
    ?>

    
    </div>
</div>

<?php 
include('partials/footer.php')
?>
