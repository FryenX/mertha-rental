<?php 
    include('./partials-frontend/header.php');

    if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            
            if($id !=="")
            {
                $sql_brand_name = "SELECT brands.name as brand_name1, brand_image FROM brands WHERE brand_id = '$id'";

                $res_brand_name = mysqli_query($conn, $sql_brand_name);
                            
                $count_brand_name = mysqli_num_rows($res_brand_name);

                if($count_brand_name == 1)
                {
                $brand_name_row = mysqli_fetch_assoc($res_brand_name);
                $brand_name1 = $brand_name_row['brand_name1'];
                $brand_image = $brand_name_row['brand_image'];

                }
            }
        }
?>

    <section class="header-menu">
        <div class="top-filler">
        <img src="./images/filler/ramevespa1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover; ">
        </div>
    </section>

    <section class="popular-choices padding-brands">
            <div class="container padding-content">
                <div class="text-center padding-title">
                    <h1>Browse <?php echo $brand_name1 ?></h1>
                </div>
                    <div class="row">

    <?php 
        if(isset($_GET['id']))
        {   
            $id = $_GET['id'];
            
            if(isset($id))
            {   
                $sql_brand_name = "SELECT brands.name as brand_name2 FROM brands WHERE brand_id = '$id'";

                $res_brand_name = mysqli_query($conn, $sql_brand_name);
                                    
                $count_brand_name = mysqli_num_rows($res_brand_name);

                if($count_brand_name == 1)
                {
                    $brand_name_row = mysqli_fetch_assoc($res_brand_name);
                    $brand_name2 = $brand_name_row['brand_name2'];
                }

                $sql_brand = "SELECT bike_id, bikes.name as bike_name, price as weekly_price, cast(sum(price-(price*(1*0.1))) as DECIMAL (7,2)) as monthly_price, 
                                    harga as weekly_harga, cast(sum(harga-(harga*(1*0.1))) as DECIMAL (10,2)) as monthly_harga, year, cc, bike_image, bikes.featured as bike_featured, 
                                    bikes.active as bike_active, categories.name as category_name, brands.name as brand_name
                                    FROM bikes
                                    INNER JOIN categories ON categories.category_id = bikes.category_id
                                    INNER JOIN brands ON brands.brand_id = bikes.brand_id
                                    WHERE brands.brand_id = '$id' AND bikes.active = 'Yes'
                                    GROUP BY bike_id
                                    ";

                $res_brand = mysqli_query($conn, $sql_brand);
                                    
                $count_brand = mysqli_num_rows($res_brand);

                if($count_brand>0)
                {
                    while($row_brand=mysqli_fetch_assoc($res_brand))
                    {

                        $id = $row_brand['bike_id'];
                        $bike_name = $row_brand['bike_name'];
                        $bike_price_weekly = $row_brand['weekly_price'];
                        $bike_price_monthly = $row_brand['monthly_price'];
                        $bike_harga_weekly = $row_brand['weekly_harga'];
                        $bike_harga_monthly = $row_brand['monthly_harga'];
                        $bike_year = $row_brand['year'];
                        $bike_cc = $row_brand['cc'];
                        $bike_image = $row_brand['bike_image'];
                        $featured = $row_brand['bike_featured'];
                        $active = $row_brand['bike_active'];
                        $bike_category = $row_brand['category_name'];
                        $bike_brand = $row_brand['brand_name'];

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
                                                                <a href="<?php echo SITEURL; ?>rent-bikes.php?rent_id=<?php echo $id; ?><?php if (isset($_SESSION['login-user'])): ?>&user_id=<?php echo $uid; ?><?php endif; ?>">
                                                                    <img src="<?php echo SITEURL; ?>/images/bikes/<?php echo $bike_image; ?>" 
                                                                    class="rounded bike_img">
                                                                </a>

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
                                                        <a href="<?php echo SITEURL; ?>rent-bikes.php?rent_id=<?php echo $id; ?><?php if (isset($_SESSION['login-user'])): ?>&user_id=<?php echo $uid; ?><?php endif; ?>" class="btn rent-btn">
                                                            Rent Now
                                                        </a>
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
                    echo "<div class='text-center notice-text-failed'>No $brand_name2 Added </div>";
                }
            }
        }
    ?>

            </div>
        </div>
    </section>

<?php 
    include('./partials-frontend/footer.php')
?>