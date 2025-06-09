<?php 
    include('./partials-frontend/header.php')
?>

    <section class="header-menu">
        <div class="top-filler">
        <img src="./images/filler/ramevespa1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover; ">
        </div>
    </section>

    <div class="container padding-content rent-bike">
        <h1 class="text-center padding-title">Your Order</h1>
        <div class="row">

        <?php 
            
            $sn = 1;

            $sql_order_status = "SELECT user.user_id, order_id, from_date, to_date, rent_duration, 
            SUM( CASE 
                WHEN rent_duration > 30 THEN price * (1 - 0.1) * rent_duration 
                ELSE price * rent_duration 
            END) AS total_price, 
            SUM(CASE 
                WHEN rent_duration > 30 THEN harga * (1 - 0.1) * rent_duration 
                ELSE harga * rent_duration 
            END) AS total_harga,
            pickup_method, bikes.name as bike_name, year, cc, payment, bike_image, categories.name as category_name, brands.name as brand_name, status
            FROM orders
            INNER JOIN bikes ON orders.bike_id = bikes.bike_id
            INNER JOIN user ON user.user_id = orders.user_id
            INNER JOIN brands ON bikes.brand_id = brands.brand_id
            INNER JOIN categories ON bikes.category_id = categories.category_id
            WHERE orders.user_id = '$user_id' AND order_date >= CURDATE() - INTERVAL 30 DAY
            GROUP BY orders.order_id
            ORDER BY order_date DESC
            ";

            $res_order_status = mysqli_query($conn, $sql_order_status);

            $count_order_status = mysqli_num_rows($res_order_status);

            if($count_order_status>0)
            {
                while($row = mysqli_fetch_assoc($res_order_status))
                {
                    $user_id = $row['user_id'];
                    $order_id = $row['order_id'];
                    $from_date = $row['from_date'];
                    $to_date = $row['to_date'];
                    $rent_duration = $row['rent_duration'];
                    $pickup_method = $row['pickup_method'];
                    $bike_name = $row['bike_name'];
                    $payment = $row['payment'];
                    $status = $row['status'];
                    $bike_category = $row['category_name'];
                    $bike_brand = $row['brand_name'];
                    $bike_year = $row['year'];
                    $bike_cc = $row['cc'];
                    $bike_image = $row['bike_image'];
                    $total_price = $row['total_price'];
                    $total_harga = $row['total_harga'];

                    ?>

                <div class="col-6">
                    <ul class="list-group padding-list-group">
                        <li class="list-group-item padding-list-group-item shadow p-auto mb-auto">
                            <div class="row">
                            <div class="col-sm-6 align-items-center">
                                                    <?php 
                                                        if($bike_image=="")
                                                        {
                                                            echo "<div class='notice-text-failed'>Image Not Available</div>";
                                                        }
                                                        else
                                                        {
                                                            ?>


                                                        <div class="position-relative">
                                                            <img style="height: 180px;" src="<?php echo SITEURL; ?>/images/bikes/<?php echo $bike_image; ?>">
                                                                <div class="col-sm-6 mb-2 d-flex position-absolute z-3 text-price">
                                                                    <div class="text-choices">
                                                                    <h5 class="rent-duration">$<?php echo $total_price ?></h5>
                                                                </div>
                                                            </div>
                                                        </div>

                                                            <?php
                                                        }

                                                            ?>
                                                            </div>
                                <div class="col-sm-6">
                                        <h4 class="rent-bike-name">
                                            <?php echo $bike_brand ?>
                                            <?php echo $bike_name ?>
                                            <?php echo $bike_year ?>
                                            <?php echo $bike_cc ?><small>cc</small>
                                            <?php echo $bike_category ?>
                                        </h4>
                                    <div class="rent-wraper">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <div class="text-choices">
                                                    <h5 class="rent-duration">From Date</h5>
                                                    <p class="price"><?php echo $from_date ?></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="text-choices">
                                                    <h5 class="rent-duration">To Date</h5>
                                                    <p class="price"><?php echo $to_date ?></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="text-choices">
                                                    <h5 class="rent-duration">Rent Duration</h5>
                                                    <p class="price"><?php echo $rent_duration ?> Days</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="text-choices">
                                                    <h5 class="rent-duration">Status</h5>
                                                    <p class="price">
                                                        <div class="status" style="color: <?php echo $status ? 'green' : 'red'; ?>">
                                                            <?php echo $status ? 'Paid' : 'Unpaid'; ?>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                    <?php

                }
            }
            else
            {
                echo "<div class='notice-text-failed text-center'>You dont have order yet</div>";
            }

        ?>

        </div>
    </div>
    
        


<?php 
    include('./partials-frontend/footer.php')
?>