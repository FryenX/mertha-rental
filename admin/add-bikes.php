<?php 
    include('./partials/header.php')
?>

<div class="container padding-top padding-content">
    <h1 class="padding-title text-center">Add Bikes</h1>

    <?php 
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }
    ?>

        <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row padding-top-2">
                        <div class="col-3"></div>
                            <div class="col-6 d-flex mb-3">
                                <div class="col-sm-3">
                                    <h6>Bike Name</h6>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <input type="text" name="name" placeholder="Bike Name" class="form-control form-control-lg bg-light fs-6">
                                    </div>
                                </div>
                            </div>
                        <div class="col-3"></div>

                        <div class="col-3"></div>
                            <div class="col-6 d-flex mb-3">
                                <div class="col-sm-3">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <input type="number" name="price" placeholder="Bike Price in $" class="form-control form-control-lg bg-light fs-6">
                                    </div>
                                </div>
                            </div>
                        <div class="col-3"></div>

                        <div class="col-3"></div>
                            <div class="col-6 d-flex mb-3">
                                <div class="col-sm-3">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <input type="number" name="harga" placeholder="Bike Price in Rp" class="form-control form-control-lg bg-light fs-6">
                                    </div>
                                </div>
                            </div>
                        <div class="col-3"></div>

                        <div class="col-3"></div>
                            <div class="col-6 d-flex mb-3">
                                <div class="col-sm-3">
                                    <h6>Production Year</h6>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <input type="year" placeholder="YYYY" min="1900" max="2100" name="year" placeholder="Bike Model Year" class="form-control form-control-lg bg-light fs-6">
                                    </div>
                                </div>
                            </div>
                        <div class="col-3"></div>

                        <div class="col-3"></div>
                            <div class="col-6 d-flex mb-3">
                                <div class="col-sm-3">
                                    <h6>Bike CC</h6>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <input type="number" name="cc" placeholder="Bike CC" class="form-control form-control-lg bg-light fs-6">
                                    </div>
                                </div>
                            </div>
                        <div class="col-3"></div>

                        <div class="col-3"></div>
                            <div class="col-6 d-flex mb-3">
                                <div class="col-sm-3">
                                    <h6>Bike Image</h6>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <input type="file" name="image" placeholder="Bike Image" class="form-control form-control-lg bg-light fs-6">
                                    </div>
                                </div>
                            </div>
                        <div class="col-3"></div>
                        
                        <div class="col-3"></div>
                            <div class="col-6 d-flex mb-3">
                                <div class="col-sm-3">
                                    <h6>Featured</h6>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <div class="form-check me-3">
                                            <input type="Radio" name="featured" value="Yes" id="featured1" class="form-check-input fs-6">
                                            <label class="form-check-label" for="featured1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="Radio" name="featured" value="No" id="featured2" class=" form-check-input fs-6">
                                            <label class="form-check-label" for="featured2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-3"></div>

                        <div class="col-3"></div>
                        <div class="col-6 d-flex mb-3">
                                <div class="col-sm-3">
                                    <h6>Active</h6>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <div class="form-check me-3">
                                            <input type="Radio" name="active" value="Yes" id="featured3" class="form-check-input fs-6">
                                            <label class="form-check-label" for="featured3">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="Radio" name="active" value="No" id="featured4" class=" form-check-input fs-6">
                                            <label class="form-check-label" for="featured4">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-3"></div>

                        <div class="col-3"></div>
                            <div class="col-6 d-flex mb-3">
                                <div class="col-sm-3">
                                    <h6>Bike Brand</h6>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <select name="brand" id="brand" class="form-select" aria-label="Default select example">
                                            <option value="">Not Selected</option>
                                            <?php 
                                                $sql_brand = "SELECT * FROM brands";

                                                $res_brand = mysqli_query($conn, $sql_brand);

                                                $count_brand = mysqli_num_rows($res_brand);

                                                if($res_brand>0)
                                                {
                                                    while ($row_brand=mysqli_fetch_assoc($res_brand))
                                                    {
                                                        $brand_id = $row_brand['brand_id'];
                                                        $brand_name = $row_brand['name'];
                                                        ?>

                                                        <option value="<?php echo $brand_id ?>"><?php echo $brand_name ?></option>

                                                    <?php
                                                    }
                                                    
                                                }
                                                else
                                                {
                                                    echo "<div class='notice-text-failed'>No Brands Added</div>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="col-3"></div>
                        
                    

                                
                        <div class="col-3"></div>
                            <div class="col-6 d-flex mb-3">
                                <div class="col-sm-3">
                                    <h6>Bike Category</h6>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <select name="category" id="category" class="form-select" aria-label="Default select example">
                                            <option value="">Not Selected</option>
                                        <?php 
                                            $sql_category = "SELECT * FROM categories";

                                            $res_category = mysqli_query($conn, $sql_category);

                                            $count_category = mysqli_num_rows($res_category);

                                            if($res_category>0)
                                            {
                                                while ($row_category=mysqli_fetch_assoc($res_category))
                                                {
                                                    $category_id = $row_category['category_id'];
                                                    $category_name = $row_category['name'];
                                                    ?>

                                                    <option value="<?php echo $category_id ?>"><?php echo $category_name ?></option>

                                                <?php
                                                }
                                                
                                            }
                                            else
                                            {
                                                echo "<option value=''>Not Selected</option>";
                                            }
                                        ?>

                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="col-3"></div>

                        
                        <div class="col-3"></div>
                            <div class="col-6">
                                <div class="text-center">
                                    <input class="btn btn-success" type="submit" name="submit" value="Add Category"></input>
                                    <input class="btn btn-danger" type="reset" name="reset" value="Reset"></input>
                                </div>
                            </div>
                        <div class="col-3"></div>
                    </div>
                </form>
            </div>

        <?php 
        
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $harga = $_POST['harga'];
            $year = $_POST['year'];
            $cc = $_POST['cc'];
        
            $featured = isset($_POST['featured']) ? $_POST['featured'] : "No";
            $active = isset($_POST['active']) ? $_POST['active'] : "No";
        
            $brand = !empty($_POST['brand']) ? $_POST['brand'] : "NULL";
            $category = !empty($_POST['category']) ? $_POST['category'] : "NULL";
        
            // Handle image upload
            if(isset($_FILES['image']['name']))
            {
                $image_name = $_FILES['image']['name'];
                if($image_name != "")
                {
                    $part = explode('.', $image_name);
                    $ext = end($part);
                    $image_name = "Bike_img_".rand(000, 999).'.'.$ext;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/bikes/".$image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);
        
                    if(!$upload)
                    {
                        $_SESSION['upload'] = "<div class='notice-text-failed'>Failed to Upload Image</div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }
                }
            }
            else
            {
                $image_name = "";  // If no image, set empty string
            }
        
            // Insert data into the database
            $sql = "INSERT INTO bikes SET
                name = '$name',
                price = '$price',
                harga = '$harga',
                year = '$year',
                cc = '$cc',
                featured = '$featured',
                active = '$active',
                brand_id = $brand,      -- No quotes around NULLable values
                category_id = $category,  -- No quotes around NULLable values
                bike_image = '$image_name'
            ";
        
            // Execute query
            $res = mysqli_query($conn, $sql);
        
            // Check if query executed successfully
            if($res == TRUE)
            {
                $_SESSION['add'] = "<div class='notice-text-success'>Bike Added Successfully</div>";
                header('location:'.SITEURL.'admin/manage-bikes.php');
            }
            else
            {
                $_SESSION['add'] = "<div class='notice-text-failed'>Failed To Add Bike, Please Try Again Later</div>";
                header('location:'.SITEURL.'admin/manage-bikes.php');
            }
        }
        

        ?>

<?php 
    include('./partials/footer.php')
?>