<?php 
    include('./partials-frontend/header.php')
?>
    <section class="header-menu">
        <div class="top-filler">
        <img src="./images/filler/ramevespa1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover; ">
        </div>
    </section>
    
    <section class="popular-choices padding-brands padding-content">
        <div class="container padding-content">
            <div class="text-center padding-title">
                <h1>Browse all Bikes</h1>
            </div>
            <div class="row">
                
            <?php 
                $sql_bikes = "SELECT bike_id, bikes.name as bike_name, price as weekly_price, cast(sum(price-(price*(1*0.1))) as DECIMAL (7,2)) as monthly_price, 
                harga as weekly_harga, cast(sum(harga-(harga*(1*0.1))) as DECIMAL (10,2)) as monthly_harga, year, cc, bike_image, bikes.featured as bike_featured, 
                bikes.active as bike_active, categories.name as category_name, brands.name as brand_name
                FROM bikes
                INNER JOIN categories ON categories.category_id = bikes.category_id
                INNER JOIN brands ON brands.brand_id = bikes.brand_id
                WHERE bikes.active = 'Yes'
                GROUP BY bike_id
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

                                                    <a href="<?php echo SITEURL; ?>rent-bikes.php?rent_id=<?php echo $id; ?><?php if (isset($_SESSION['login-user'])): ?>&user_id=<?php echo $uid; ?><?php endif; ?>">
                                                    <img src="<?php echo SITEURL; ?>/images/bikes/<?php echo $bike_image; ?>" class="rounded bike_img"></a>

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
                            echo "<div class='notice-text-failed text-center'>No Bikes Added</div>";
                        }
                    ?>

            </div>
        </div>
    </section>


<?php 
    include('./partials-frontend/footer.php')
?>