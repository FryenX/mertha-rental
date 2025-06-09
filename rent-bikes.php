<?php 
    include('./partials-frontend/header.php');
    include('./partials-frontend/login-check-front.php')
?>

    <section class="header-menu">
        <div class="top-filler">
        <img src="./images/filler/ramevespa1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover; ">
        </div>
    </section>

    <section class="rent-bike">
        <div class="container padding-content padding-list-group">
            <?php

                $sql_rent = "SELECT bike_id, CONCAT(brands.name, ' ', bikes.name) as rent_name, bikes.year, bike_image, bikes.featured, bikes.active
                            FROM bikes INNER JOIN brands ON bikes.brand_id = brands.brand_id
                            WHERE bikes.active = 'Yes'
                            ";
                $rent_res = mysqli_query($conn, $sql_rent);
                $rent_count = mysqli_num_rows($rent_res);

                $rent_image = "";

                if ($rent_count > 0) {
                    $rent_row = mysqli_fetch_assoc($rent_res);
                    $rent_image = $rent_row['bike_image'];
                    $default_bike_id = $rent_row['bike_id'];
                }

                if (isset($_GET['user_id'])) 
                {
                    $user_id = $_GET['user_id'];
                    $rent_id = $_GET['rent_id'];

                    $sql_user = "SELECT user_id AS user_order FROM user WHERE uid = '$user_id'";

                    $res_user = mysqli_query($conn, $sql_user);
                    $count_user = mysqli_num_rows($res_user);

                    if($count_user == 1)
                    {
                        $user_row = mysqli_fetch_assoc($res_user);
                        $user_order = $user_row['user_order'];
                    }
                    else
                    {
                        header('location:'.SITEURL.'index.php');
                    }
                }

                $sql_rent = "SELECT bike_id, CONCAT(brands.name, ' ', bikes.name) as rent_name, price, harga, bikes.year, bike_image, bikes.featured, bikes.active
                            FROM bikes INNER JOIN brands ON bikes.brand_id = brands.brand_id
                            WHERE bike_id='$rent_id'";
                $rent_res = mysqli_query($conn, $sql_rent);
                $rent_count = mysqli_num_rows($rent_res);

                $rent_image = "";

                if ($rent_count > 0) {
                    $rent_row = mysqli_fetch_assoc($rent_res);
                    $rent_image = $rent_row['bike_image'];
                    $default_bike_id = $rent_row['bike_id'];
                    $price = $rent_row['price'];
                    $harga = $rent_row['harga'];
                }

            ?>

            <div class="row">
                <div class="col-6 col-6-center">
                    <?php if ($rent_image == ""): ?>
                        <div class='notice-text-failed'>Image Not Available</div>
                    <?php else: ?>
                        <img idc="bikeImage" src="<?php echo SITEURL; ?>/images/bikes/<?php echo $rent_image; ?>" style="height: auto;" class="rounded w-100 mb-3">
                        <h4 class="text-center">$<?php echo $price ?> for each day</h4>
                        <p class="text-center">or</p>
                        <h6 class="text-center">Rp<?php echo $harga ?> for each day</h6>
                    <?php endif; ?>
                </div>
                <div class="col-6">
                    <div class="text-center rent-bike-text-wraper">
                        <h1>Rent a Bike</h1>
                        <p>We will deliver your bike directly to the villa or you can pick it up at our office</p>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                            <label for="date_range" class="form-label">Select Date Range</label>
                            <input type="text" name="date_range" id="date_range" class="form-control form-control-lg bg-light fs-6" required>
                        </div>
                        <div class="mb-3">
                            <label for="bike_type" class="form-label">Bike Type</label>
                            <select class="form-select w-100" name="bike_type" id="bike_type" aria-label="Select bike type">
                                <?php
                                    mysqli_data_seek($rent_res, 0);
                                    while ($rent_row = mysqli_fetch_assoc($rent_res)) {
                                        $selected = ($rent_row['bike_id'] == $default_bike_id) ? 'selected' : '';
                                        echo "<option value='" . $rent_row['bike_id'] . "' data-image='" . $rent_row['bike_image'] . "' $selected>" . $rent_row['rent_name'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <p>Payment Method</p>
                            <div class="mb-1">
                                <select name="payment" id="payment" class="form-select w-100">
                                    <option value="credit-card">Credit Card</option>
                                    <option value="paypal">Paypal</option>
                                    <option value="cash">Cash</option>
                                </select>
                            </div>
                        <p>Pick up Method</p>
                        <div class="d-flex mb-3">
                            <div class="form-check me-3">
                                <input type="radio" name="pickup" value="Walk-in" id="featured1" class="form-check-input fs-6">
                                <label class="form-check-label" for="featured1">
                                    Walk-in our office
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input type="radio" name="pickup" value="Delivery" id="featured2" class="form-check-input fs-6">
                                <label class="form-check-label" for="featured2">
                                    Delivery
                                </label>
                            </div>
                    </div>
                        <?php if (isset($_SESSION['login-user'])): ?>
                            <input type="hidden" name="user_id" class="btn rent-btn rent-bike-btn w-100" value="<?php echo $user_order ?>">
                            <input type="hidden" name="status" class="btn rent-btn rent-bike-btn w-100" value="Unpaid">
                            <input type="submit" name="renting" class="btn rent-btn rent-bike-btn w-100" value="Rent Now">
                        <?php else: ?>
                            <input href="<?php echo SITEURL; ?>rent-bikes.php" class="btn rent-btn rent-bike-btn w-100" value="Rent Now"></input>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php 

        if (isset($_POST['renting'])) {
            $date_range = $_POST['date_range'];
            $rent_id = $_POST['bike_type'];
            $order_date = date('Y-m-d H:i:s');
            $user_order_id = $_POST['user_id'];
            $status = $_POST['status'];
            $payment = $_POST['payment'];
            if(isset($_POST['pickup']))
            {
                $pickup_method = $_POST['pickup'];
            }
            else
            {
                $pickup_method = "Delivery";
            }
            
            $dates = explode(' - ', $date_range);
            
            if (count($dates) == 2) {
                $from_date = $dates[0];
                $to_date = $dates[1];

                $date1 = new DateTime($from_date);
                $date2 = new DateTime($to_date);
                $interval = $date1->diff($date2);
                $days = $interval->days;

                if ($date1 > $date2) {
                    echo "<div class='notice-text-failed'>End date must be after the start date.</div>";
                } else {
                    $sql_order = "INSERT INTO orders (from_date, to_date, order_date, rent_duration, status , payment, bike_id, user_id ,pickup_method) 
                    VALUES ('$from_date', '$to_date', '$order_date', '$days', '$status', '$payment','$rent_id', '$user_order_id','$pickup_method')";

                    $res_order =  mysqli_query($conn, $sql_order) or die(mysqli_error($conn));

                    if($res_order==TRUE)
                    {
                        $_SESSION['order'] = "<div class='notice-text-success'> You Have successfully request your order </div>";

                        header("location:".SITEURL.'orders.php');
                        ob_end_flush();
                    }
                    else
                    {
                        $_SESSION['add'] = "<div class='notice-text-success'> Failed to Place an Order, Please try again later </div>";

                        header("location:".SITEURL.'orders.php');
                        ob_end_flush();
                    }
                }
            }
            else 
            {
                echo "<div class='notice-text-failed'>Invalid date range format.</div>";
            }
        }


        ?>

<?php 
    include('./partials-frontend/footer.php')
?>