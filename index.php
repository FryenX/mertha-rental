<?php 
    include('./partials-frontend/header.php');
?>
        
        <section class="carousel section">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php 
                    $sql_carousel = "SELECT * FROM carousel WHERE featured = 'Yes' AND active = 'Yes' LIMIT 3";
                    $res_carousel = mysqli_query($conn, $sql_carousel);
                    $count_carousel = mysqli_num_rows($res_carousel);

                    if($count_carousel > 0)
                    {
                        $first = true;
                        while($row_carousel = mysqli_fetch_assoc($res_carousel))
                        {
                            $id = $row_carousel['carousel_id'];
                            $title = $row_carousel['carousel_title'];
                            $carousel_image = $row_carousel['carousel_image'];
                            $description = $row_carousel['carousel_description'];
                            
                            ?>
                            <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                                <?php 
                                    if($carousel_image == "")
                                    {
                                        echo "<div class='notice-text-failed'>Image Not Available</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>/images/carousel/<?php echo $carousel_image; ?>" class="d-block w-100" alt="...">
                                        <?php
                                    }
                                ?>
                                <div class="carousel-caption d-none d-md-block">
                                    <h1><?php echo $title ?></h1>
                                    <h5><?php echo $description ?></h5>
                                </div>
                            </div>
                            <?php
                            $first = false;
                        }
                    }
                    else
                    {
                        echo "<div class='text-center notice-text-failed'>No Carousel Added</div>";
                    }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    <!--How it works-->
    <section class="work-section">
        <div class="container padding-content">
            <h1 class="text-center padding-title text-white">How it Works?</h1>
            <div class="garage-content">
                <div class="row">
                    <div class="col padding-list-group-item">
                        <div class="work-wraper">
                            <div class="work-text">
                                <div class="work-item">
                                    <h5 class="num-bg">01</h5>
                                </div>
                                <div class="work-h5">
                                    <h5>Choose bike and date.</h5>
                                </div>
                                <div class="work-p">
                                    <small>Wide range of bike choices</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col padding-list-group-item">
                        <div class="work-wraper">
                            <div class="work-text">
                                <div class="work-item">
                                    <h5 class="num-bg">02</h5>
                                </div>
                                <div class="work-h5">
                                    <h5>Choose book in Date</h5>
                                </div>
                                <div class="work-p">
                                    <small>Make sure to put the right date</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col padding-list-group-item">
                        <div class="work-wraper">
                            <div class="work-text">
                                <div class="work-item">
                                    <h5 class="num-bg">03</h5>
                                </div>
                                <div class="work-h5">
                                    <h5>Book and Pay</h5>
                                </div>
                                <div class="work-p">
                                    <small>Many payment methods</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!--Garage featured-->
        <div class="container rent-bike padding-content">
            <div class="text-center padding-title">
                <h1>Explore our Categories</h1>
            </div>
                    <div class="garage-content">
                        <div class="row">

            <?php 
                $sql_category = "SELECT * FROM categories WHERE featured = 'Yes' AND active = 'Yes' LIMIT 3";

                $res_category = mysqli_query($conn, $sql_category);

                $count_category = mysqli_num_rows($res_category);

                if($count_category>0)
                {
                    while($row_category=mysqli_fetch_assoc($res_category))
                    {
                        $category_id = $row_category['category_id'];
                        $category_name = $row_category['name'];
                        $category_image = $row_category['category_image'];
                        $featured = $row_category['featured'];
                        $active = $row_category['active'];
                        
                        ?>

                            <div class="col padding-list-group-item">
                                <div class="text-center position-relative">

                                    <?php 
                                        if($category_image=="")
                                        {
                                            echo "<div class='notice-text-failed'>Image Not Available</div>";
                                        }
                                        else
                                        {
                                            ?>

                                            <a href="<?php echo SITEURL; ?>category-bikes.php?category_id=<?php echo $category_id ?>"><img src="<?php echo SITEURL; ?>/images/category/<?php echo $category_image; ?>" class="rounded category_img" alt="..."></a>

                                            <?php
                                        }

                                    ?>

                                    <div class="z-1 caption-garage">
                                        <h5><a href="<?php echo SITEURL; ?>category-bikes.php?category_id=<?php echo $category_id ?>"><?php echo $category_name ?></a></h5>
                                    </div>
                                </div>
                            </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='text-center notice-text-failed'>No Category Added</div>";
                }
            ?>

                    
                </div>
            </div>
        </div>


    <!--Choices featured-->
    <section class="popular-choices">
        <div class="container padding-content">
            <div class="text-center padding-title">
                <h1>Popular Choices</h1>
            </div>
                <div class="row">
                    <?php 
                        $sql_bikes = "SELECT bike_id, bikes.name as bike_name, price as weekly_price, cast(sum(price-(price*(1*0.1))) as DECIMAL (7,2)) as monthly_price, 
                        harga as weekly_harga, cast(sum(harga-(harga*(1*0.1))) as DECIMAL (10,2)) as monthly_harga, year, cc, bike_image, bikes.featured as bike_featured, 
                        bikes.active as bike_active, categories.name as category_name, brands.name as brand_name
                        FROM bikes
                        INNER JOIN categories ON categories.category_id = bikes.category_id
                        INNER JOIN brands ON brands.brand_id = bikes.brand_id
                        WHERE bikes.featured = 'Yes' AND bikes.active = 'Yes'
                        GROUP BY bike_id
                        LIMIT 4
                        ";

                        $res_bikes = mysqli_query($conn, $sql_bikes);
                    
                        $count_bikes = mysqli_num_rows($res_bikes);

                        if($count_bikes>0)
                        {
                            while($row_bikes=mysqli_fetch_assoc($res_bikes))
                            {
                                $id = $row_bikes['bike_id'];
                                $bike_name = $row_bikes['bike_name'];
                                $bike_price_weekly = $row_bikes['weekly_price'];
                                $bike_price_monthly = $row_bikes['monthly_price'];
                                $bike_harga_weekly = $row_bikes['weekly_harga'];
                                $bike_harga_monthly = $row_bikes['monthly_harga'];
                                $bike_year = $row_bikes['year'];
                                $bike_cc = $row_bikes['cc'];
                                $bike_image = $row_bikes['bike_image'];
                                $featured = $row_bikes['bike_featured'];
                                $active = $row_bikes['bike_active'];
                                $bike_category = $row_bikes['category_name'];
                                $bike_brand = $row_bikes['brand_name'];
                                            
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

                                                            <a href="<?php echo SITEURL; ?>rent-bikes.php?rent_id=<?php echo $id; ?><?php if (isset($_SESSION['login-user'])): ?>&user_id=<?php echo $uid; ?><?php endif; ?>"><img src="<?php echo SITEURL; ?>/images/bikes/<?php echo $bike_image; ?>" class="bike_img"></a>

                                                            <?php
                                                        }

                                                            ?>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <a href="<?php echo SITEURL; ?>rent-bikes.php?rent_id=<?php echo $id; ?><?php if (isset($_SESSION['login-user'])): ?>&user_id=<?php echo $uid; ?><?php endif; ?>">
                                                                    <h4 class="rent-bike-name">
                                                                        <?php echo $bike_brand ?>
                                                                        <?php echo $bike_name ?>
                                                                        <?php echo $bike_year ?>
                                                                        <?php echo $bike_cc ?><small>cc</small>
                                                                        <?php echo $bike_category ?>
                                                                    </h4>
                                                                </a>
                                                                    <div class="rent-wraper">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="text-choices">
                                                                                    <h5 class="rent-duration">Weekly</h5>
                                                                                    <p class="price">$<?php echo $bike_price_weekly ?> each day</p>
                                                                                    <p class="harga">Rp <?php echo $bike_harga_weekly ?></p>
                                                                                </div>
                                                                            </div>
                                                                        <div class="col-sm-6">
                                                                        <div class="text-choices">
                                                                            <h5 class="rent-duration">Monthly</h5>
                                                                            <p class="price">$<?php echo $bike_price_monthly ?> each day</p>
                                                                        <p class="harga">Rp <?php echo $bike_harga_monthly ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <form action="<?php echo SITEURL; ?>rent-bikes.php" method="POST">
                                                    <a href="<?php echo SITEURL; ?>rent-bikes.php?rent_id=<?php echo $id; ?><?php if (isset($_SESSION['login-user'])): ?>&user_id=<?php echo $uid; ?><?php endif; ?>" class="btn rent-btn">
                                                        Rent Now
                                                    </a>
                                                    </form>
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
                            echo "<div class='text-center notice-text-failed'>No Category Added</div>";
                        }
                    ?>
            </div>
        </div>
    </section>


    <!--Rent a bike-->
    <section class="">
        <div class="container padding-brands padding-content rent-bike padding-list-group">
            <?php 
                        
                $sql_rent = "SELECT bike_id, CONCAT(brands.name, ' ', bikes.name) as rent_name, bikes.year, price, harga, bike_image, bikes.featured, bikes.active
                            FROM bikes INNER JOIN brands ON bikes.brand_id = brands.brand_id
                            WHERE bikes.featured = 'Yes' AND bikes.active = 'Yes'
                            LIMIT 4";
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
                <div class="col-6">
                    <?php if ($rent_image == ""): ?>
                        <div class='text-center notice-text-failed'>Image Not Available</div>
                    <?php else: ?>
                        
                        <div class="position-relative">
                            <img id="bikeImage" src="<?php echo SITEURL; ?>/images/bikes/<?php echo $rent_image; ?>" class="rounded category_image w-100 mb-3">
                                <div class="col-sm-6 mb-2 d-flex position-absolute z-3 text-price">
                                        <div class="text-choices">
                                    <h5 class="rent-duration">$<?php echo $price ?></h5>
                                </div>
                            </div>
                        </div>                                
                    <?php endif; ?>
                </div>
                <div class="col-6">
                    <div class="text-center rent-bike-text-wraper">
                        <h1>Rent a Bike</h1>
                        <p>We will deliver your bike directly to the villa or you can pick it up at our office</p>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-1">
                            <label for="date_range" class="form-label">Select Date Range</label>
                            <input type="text" name="date_range" id="date_range" class="form-control form-control-lg bg-light fs-6" required>
                        </div>
                        <div class="mb-1">
                            <label for="bike_type" class="form-label">Bike Type</label>
                            <select class="form-select w-100" name="bike_type" id="bike_type" aria-label="Select bike type" required>
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
                        <div class="d-flex mb-1">
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
                            <input type="hidden" name="user_id" class="btn rent-btn rent-bike-btn w-100" value="<?php echo $user_id ?>">
                            <input type="hidden" name="status" class="btn rent-btn rent-bike-btn w-100" value="0">
                            <input type="submit" name="renting" class="btn rent-btn rent-bike-btn w-100" value="Rent Now">
                        <?php else: ?>
                            <a href="<?php echo SITEURL; ?>rent-bikes.php" class="btn rent-btn w-100">Rent Now</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Maps Location-->
    <section class="rent-bike">
    <div class="container padding-content">
        <div class="row">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
                <h1 class="text-center padding-title">Visit our office at Jimbaran</h1>
                    <small class="text-center mb-3">Tell us when you want to visit:</small>
                    <div class="row nav-chat align-items-center d-flex justify-content-center mb-5">
                        <div class="col-12 col-sm-6 mb-2 mb-sm-0 d-flex justify-content-center">
                            <a href="https://wa.me/6285157949973" class="btn btn-success me-3 d-flex align-items-center whatsapp-btn">
                                <i class="fa-brands fa-whatsapp whatsapp-icon"></i>WhatsApp
                            </a>
                            <a href="https://t.me/SaulGoodman24" class="btn btn-primary d-flex align-items-center telegram-btn">
                                <i class="fa-brands fa-telegram telegram-icon"></i>Telegram
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <p class="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.8656270398556!2d115.15991207589963!3d-8.798692689957743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sen!2sid!4v1721403209314!5m2!1sen!2sid" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </p>
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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('date_range');
            const today = new Date();
            today.setDate(today.getDate() + 1);
            const minDate = today.toISOString().split('T')[0];
            dateInput.setAttribute('min', minDate);


            const bikeTypeSelect = document.getElementById('bike_type');
            const bikeImage = document.getElementById('bikeImage');

            bikeTypeSelect.addEventListener('change', function() {
                const selectedOption = bikeTypeSelect.options[bikeTypeSelect.selectedIndex];
                const imageUrl = selectedOption.getAttribute('data-image');
                if (imageUrl) {
                    bikeImage.src = "<?php echo SITEURL; ?>/images/bikes/" + imageUrl;
                } else {
                    bikeImage.src = '';
                }
            });

            bikeTypeSelect.dispatchEvent(new Event('change'));
            });
        </script>

<?php 
    include('./partials-frontend/footer.php')
?>