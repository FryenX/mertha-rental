<?php 
    include('./partials-frontend/header.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
?>

    <section class="header-menu">
        <div class="top-filler">
        <img src="./images/filler/ramevespa1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover; ">
        </div>
    </section>

    <section class="popular-choices padding-brands padding-content">
        <div class="container padding-content">
            <div class="text-center padding-title">
                <h1>Browse <?php echo $search ?></h1>
            </div>

            <div class="row">
                
            <?php

            

                $search = $_POST['search'];

                $sql_search = "SELECT bike_id, bikes.name as bike_name, price as weekly_price, cast(sum(price-(price*(1*0.1))) as DECIMAL (7,2)) as monthly_price, 
                harga as weekly_harga, cast(sum(harga-(harga*(1*0.1))) as DECIMAL (10,2)) as monthly_harga, year, cc, bike_image, bikes.featured as bike_featured, 
                bikes.active as bike_active, categories.name as category_name, brands.name as brand_name
                FROM bikes
                INNER JOIN categories ON categories.category_id = bikes.category_id
                INNER JOIN brands ON brands.brand_id = bikes.brand_id
                WHERE bikes.name LIKE '%$search%' OR brands.name LIKE '%$search%' OR categories.name LIKE '%$search%' OR cc LIKE '$search' OR year LIKE '$search' 
                GROUP BY bike_id
                ";

                $res_search = mysqli_query($conn, $sql_search);
                    
                $count_search = mysqli_num_rows($res_search);
                
                if($search!=="")
                {
                    
                }
                else
                {
                    echo "<div class='notice-text-success search-result text-center'>Search any bike you like</div>";
                }

                if($count_search>0)
                {
                    while($row_search=mysqli_fetch_assoc($res_search))
                    {
                        $id = $row_search['bike_id'];
                        $bike_name = $row_search['bike_name'];
                        $bike_price_weekly = $row_search['weekly_price'];
                        $bike_price_monthly = $row_search['monthly_price'];
                        $bike_harga_weekly = $row_search['weekly_harga'];
                        $bike_harga_monthly = $row_search['monthly_harga'];
                        $bike_year = $row_search['year'];
                        $bike_cc = $row_search['cc'];
                        $bike_image = $row_search['bike_image'];
                        $featured = $row_search['bike_featured'];
                        $active = $row_search['bike_active'];
                        $bike_category = $row_search['category_name'];
                        $bike_brand = $row_search['brand_name'];
                                            
                            ?>
                                            
                            <div class="col-6">
                                <ul class="list-group padding-list-group">
                                    <li class="list-group-item padding-list-group-item shadow p-auto mb-auto">
                                        <div class="row">
                                            <div class="col-sm-6 d-flex align-items-center">
                                                <?php 
                                                    if($bike_image=="")
                                                    {
                                                        echo "<div class='notice-text-failed'>Image Not Available</div>";
                                                    }
                                                    else
                                                    {
                                                        ?>

                                                    <a href="<?php echo SITEURL; ?>rent-bikes.php?rent_id=<?php echo $id; ?><?php if (isset($_SESSION['login-user'])): ?>&user_id=<?php echo $uid; ?><?php endif; ?>">
                                                        <img src="<?php echo SITEURL; ?>/images/bikes/<?php echo $bike_image; ?>" class="rounded bike_img">
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
                                                    <a href="<?php echo SITEURL; ?>rent-bikes.php?rent_id=<?php echo $id; ?><?php if (isset($_SESSION['login-user'])): ?>&user_id=<?php echo $uid; ?><?php endif; ?>" type="button" class="btn rent-btn">
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
                            echo "<div class='notice-text-failed text-center'>Sorry the bike you're looking for is not available at the moment, please contact us for more detail.</div>";
                        }

                            } else {
                                echo "Search term not set.";
                            }
                        } else {
                            echo "Form not submitted.";
                        }
                    ?>

            </div>
        </div>
    </section>

<?php 
    include('./partials-frontend/footer.php')
?>