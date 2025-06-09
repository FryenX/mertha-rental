<?php 
    include('partials/header.php')
?>

    <div class="container padding-top padding-content">
        <h1 class="padding-title text-center">Manage Bikes</h1>

        <div class="position-absolute">
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
            if(isset( $_SESSION['delete']))
            {
                echo  $_SESSION['delete'];
                unset ( $_SESSION['delete']);
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset ($_SESSION['remove']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset ($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset ($_SESSION['failed-remove']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }
        ?>
    </div>

        <div class="padding-title padding-top-2">
            <a href="<?php echo SITEURL; ?>admin/add-bikes.php" class="btn btn-primary">Add bikes</a>
        </div>

            <div class="row tb-header">
                <div class="col-1 tb-bikes">
                    <p>S.N.</p>
                </div>
                <div class="col-1 tb-bikes">
                    <p>Bike Name</p>
                </div>
                <div class="col-1 tb-bikes">
                    <p>Price</p> 
                </div>
                <div class="col-1 tb-bikes">
                    <p>Harga</p> 
                </div>
                <div class="col-1 tb-bikes">
                    <p>Year</p> 
                </div>
                <div class="col-1 tb-bikes">
                    <p>CC</p> 
                </div>
                <div class="col-1 tb-bikes">
                    <p>Bike Image</p> 
                </div>
                <div class="col-1 tb-bikes">
                    <p>Featured</p> 
                </div>
                <div class="col-1 tb-bikes">
                    <p>Active</p> 
                </div>
                <div class="col-1 tb-bikes">
                    <p>Brand</p> 
                </div>
                <div class="col-1 tb-bikes">
                    <p>Category</p> 
                </div>
                <div class="col-1 tb-bikes">
                    <p>Action</p> 
                </div>
            </div>
            
            <?php 
            $sql = "SELECT 
                bike_id, 
                bikes.name as bike_name, 
                price, 
                harga, 
                year, 
                cc, 
                bikes.featured as featured, 
                bikes.active as active, 
                IFNULL(brands.name, 'No Brand') as brand_name,
                IFNULL(categories.name, 'No Category') as category_name,
                bike_image
                FROM 
                bikes
                LEFT JOIN 
                categories ON bikes.category_id = categories.category_id
                LEFT JOIN 
                brands ON bikes.brand_id = brands.brand_id;";

            $res = mysqli_query($conn, $sql);

            if(!$res) {
                echo "<div class='notice-text-failed'>Failed to execute query: " . mysqli_error($conn) . "</div>";
                exit;
            }

            $count = mysqli_num_rows($res);

            $sn = 1;

            if($count > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    
                    $bike_id = $row['bike_id'];
                    $bike_name = $row['bike_name'];
                    $price = $row['price'];
                    $harga = $row['harga'];
                    $year = $row['year'];
                    $cc = $row['cc'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    $brand_name = $row['brand_name'];
                    $category_name = $row['category_name'];
                    $bike_image = $row['bike_image'];

                    ?>

                    <div class="row tb-content d-flex align-items-center">
                        <div class="col-1 tb-bikes">
                            <p><?php echo $sn++; ?></p>
                        </div>
                        <div class="col-1 tb-bikes">
                            <p><?php echo $bike_name ?></p>
                        </div>
                        <div class="col-1 tb-bikes">
                            <p><?php echo $price ?></p> 
                        </div>
                        <div class="col-1 tb-bikes">
                            <p><?php echo $harga ?></p> 
                        </div>
                        <div class="col-1 tb-bikes">
                            <p><?php echo $year ?></p> 
                        </div>
                        <div class="col-1 tb-bikes">
                            <p><?php echo $cc ?></p> 
                        </div>
                        <div class="col-1 tb-bikes">
                        <?php 
                            if($bike_image != "") {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/bikes/<?php echo $bike_image; ?>" style="width: 100px;">
                                <?php
                            } else {
                                echo "<div class='notice-text-failed'>No Image Found</div>";
                            }
                        ?>
                        </div>
                        <div class="col-1 tb-bikes">
                            <p><?php echo $featured ?></p> 
                        </div>
                        <div class="col-1 tb-bikes">
                            <p><?php echo $active ?></p> 
                        </div>
                        <div class="col-1 tb-bikes">
                            <p><?php echo $brand_name ?></p> 
                        </div>
                        <div class="col-1 tb-bikes">
                            <p><?php echo $category_name ?></p> 
                        </div>
                        <div class="col tb-bikes">
                            <a href="<?php echo SITEURL; ?>admin/update-bike.php?id=<?php echo $bike_id; ?>"class="btn btn-secondary">Update bike</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-bike.php?id=<?php echo $bike_id; ?>&bike_image=<?php echo $bike_image; ?>" class="btn btn-danger">Delete bike</a>
                        </div>
                    </div>

                    <?php
                }
            } else {   
                ?>
                    <div class="notice-text-failed text-center">No Bikes Added</div>
                <?php
            }
            ?>


    </div>

<?php 
    include('partials/footer.php')
?>