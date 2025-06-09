<?php 
    include('./partials-frontend/header.php')
?>

    
    
    <section class="header-menu">
        <div class="top-filler">
        <img src="./images/filler/ramevespa1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover; ">
        </div>
    </section>

    <div class="container padding-content">
        <div class="text-center padding-title rent-bike">
            <h1>Explore our Garage</h1>
        </div>

        <div class="row" style="padding-left: 24px;">
        <?php 
            $sql_category = "SELECT * FROM categories WHERE active = 'Yes'";
            $res_category = mysqli_query($conn, $sql_category);
            $count_category = mysqli_num_rows($res_category);

            if ($count_category > 0) {   
                $counter = 0;

                while ($row_category = mysqli_fetch_assoc($res_category)) {
                    $category_id = $row_category['category_id'];
                    $category_name = $row_category['name'];
                    $category_image = $row_category['category_image'];
                    $featured = $row_category['featured'];
                    $active = $row_category['active'];
                    
                    if ($counter % 3 == 0 && $counter > 0) {
                        echo '</div>'; // Close the previous row
                    }
                    
                    if ($counter % 3 == 0) {
                        echo '<div class="row">'; // Open a new row
                    }
                    ?>
                    
                    <div class="col-md-4 padding-list-group-item"> <!-- Adjust the column size as needed -->
                        <div class="text-center position-relative">
                            <?php 
                                if ($category_image == "") {
                                    echo "<div class='notice-text-failed'>Image Not Available</div>";
                                } else {
                                    ?>
                                    <a href="<?php echo SITEURL; ?>category-bikes.php?category_id=<?php echo $category_id ?>">
                                    <img src="<?php echo SITEURL; ?>/images/category/<?php echo $category_image; ?>"
                                    class="rounded category_img" alt="..."></a>
                                    <?php
                                }
                            ?>
                            <div class="z-1 caption-garage text-white">
                                <h5><a href="<?php echo SITEURL; ?>category-bikes.php?category_id=<?php echo $category_id ?>"><?php echo $category_name ?></a></h5>
                            </div>
                        </div>
                    </div>

                    <?php
                    $counter++;
                }
                
                if ($counter % 3 != 0) {
                    echo '</div>'; // Close the last row if not exactly 3 items
                }
            } else {
                echo "<div class='text-center notice-text-failed'>No Category Added</div>";
            }
        ?>

            </div>
        </div>
    </div>


<?php 
    include('./partials-frontend/footer.php')
?>