<?php 
    include('partials/header.php');
?>

    <div class="container padding-top padding-content">
        <h1 class="padding-title text-center">Manage Order</h1>
        <div class="text-center mb-3">
            <?php 
                if(isset($_SESSION['confirm']))
                {
                    echo $_SESSION['confirm'];
                    unset($_SESSION['confirm']);
                }
            ?>
        </div>
        <div class="row tb-header text-center">
            <div class="col-1 tb-bikes">
                Order Number
            </div>
            <div class="col-1 tb-bikes">
                Customer
            </div>
            <div class="col-1 tb-bikes">
                From Date
            </div>
            <div class="col-1 tb-bikes">
                To Date
            </div>
            <div class="col-1 tb-bikes">
                Rent Duration
            </div>
            <div class="col-1 tb-bikes">
                Order Date
            </div>
            <div class="col-1 tb-bikes">
                Pick up Method
            </div>
            <div class="col-1 tb-bikes">
                Bike
            </div>
            <div class="col-1 tb-bikes">
                Payment Method
            </div>
            <div class="col-1 tb-bikes">
                Total Payment
            </div>
            <div class="col-1 tb-bikes">
                Rent Status
            </div>
            <div class="col-1 tb-bikes">
                Action
            </div>
        </div>
        <?php
            if (isset($_SESSION['user']))
            {
                $admin_id = $_SESSION['admin_id'];
            }
            
            
            $sql = "SELECT user.user_id, order_id, concat(user.first_name,' ', user.last_name) AS user_fullname, from_date, to_date, rent_duration, 
            order_date, pickup_method, bikes.name as bike_name, payment, status,
            SUM(
            CASE 
                WHEN rent_duration > 30 THEN price * (1 - 0.1) * rent_duration 
                ELSE price * rent_duration 
            END
            ) AS total_price
            FROM orders
            INNER JOIN bikes ON orders.bike_id = bikes.bike_id
            INNER JOIN user ON user.user_id = orders.user_id
            GROUP BY order_id
            ORDER BY order_date DESC
            ";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $user_id = $row['user_id'];
                    $order_id = $row['order_id'];
                    $user_fullname = $row['user_fullname'];
                    $from_date = $row['from_date'];
                    $to_date = $row['to_date'];
                    $rent_duration = $row['rent_duration'];
                    $order_date = $row['order_date'];
                    $pickup_method = $row['pickup_method'];
                    $bike_name = $row['bike_name'];
                    $payment = $row['payment'];
                    $status = $row['status'];
                    $total_price = $row['total_price'];

                    ?>

                        <div class="row tb-content text-center">
                        <div class="col-1 tb-bikes">
                            <?php echo $order_id ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            <?php echo $user_fullname ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            <?php echo $from_date ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            <?php echo $to_date ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            <?php echo $rent_duration ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            <?php echo $order_date ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            <?php echo $pickup_method ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            <?php echo $bike_name ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            <?php echo $payment ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            $<?php echo $total_price ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            <div class="status" style="color: <?php echo $status ? 'green' : 'red'; ?>">
                                <?php echo $status ? 'Paid' : 'Unpaid'; ?>
                            </div>
                        </div>
                        <div class="col-1 tb-bikes">
                            <a href="<?php echo SITEURL; ?>admin/confirm-payment.php?id=<?php echo $order_id ?>&admin_id=<?php echo $admin_id ?>" class="btn btn-success">Confirm Payment</a>
                        </div>
                        </div>

                    <?php

                }

            }
            else
            {
                echo "<div class='text-center notice-text-failed'>Currently No Order</div>";
            }


        ?>
        
        </div>
    </div>

<?php 
    include('partials/footer.php');
?>