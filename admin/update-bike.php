<?php 
    include('./partials/header.php')
?>

    <div class="container padding-top padding-content">
        <h1 class="padding-title text-center">Update Bikes</h1>

        <div class="">
            <?php 

            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $sql = "SELECT * FROM bikes WHERE bike_id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                        $row = mysqli_fetch_assoc($res);
                        $id = $row['bike_id'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $harga = $row['harga'];
                        $year = $row['year'];
                        $cc = $row['cc'];
                        $current_image = $row['bike_image'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        $brand = $row['brand_id'];
                        $category = $row['category_id'];




                    }
                }
            ?>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Curent Name</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="text" name="name" value="<?php echo $name ?>" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>
                
                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Curent Price in $</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="text" name="price" value="<?php echo $price ?>" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Curent Price in Rp</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="text" name="harga" value="<?php echo $harga ?>" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Current Year</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="text" name="year" value="<?php echo $year ?>" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Current CC</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="number" name="cc" value="<?php echo $cc ?>" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Current Image</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                
                                    <?php 
                                    if($current_image != "")
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images/bikes/<?php echo $current_image ?>" style="width: 200px;">
                                        <?php
                                    }
                                    else
                                    {
                                        echo "<div class='notice-text-failed'>Image Not Added</div>";
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>New image</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="file" name="image" value="<?php echo $name ?>" class="form-control form-control-lg bg-light fs-6">
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
                                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="Radio" name="featured" value="Yes" id="featured1" class="form-check-input fs-6">
                                    <label class="form-check-label" for="featured1">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input <?php if($featured=="No"){echo "checked";} ?> type="Radio" name="featured" value="No" id="featured2" class=" form-check-input fs-6">
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
                                    <input <?php if($active=="Yes"){echo "checked";} ?> type="Radio" name="active" value="Yes" id="featured3" class="form-check-input fs-6">
                                    <label class="form-check-label" for="featured3">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input <?php if($active=="No"){echo "checked";} ?> type="Radio" name="active" value="No" id="featured4" class=" form-check-input fs-6">
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
                                    <option value="1" <?php if($brand == 1) echo "selected"; ?>>Yamaha</option>
                                    <option value="2" <?php if($brand == 2) echo "selected"; ?>>Kawasaki</option>
                                    <option value="3" <?php if($brand == 3) echo "selected"; ?>>Vespa</option>
                                    <option value="4" <?php if($brand == 4) echo "selected"; ?>>Ducati</option>
                                    <option value="5" <?php if($brand == 5) echo "selected"; ?>>BMW</option>
                                    <option value="6" <?php if($brand == 6) echo "selected"; ?>>Honda</option>
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
                                    <option value="1" <?php if($category == 1) echo "selected"; ?>>Sports</option>
                                    <option value="2" <?php if($category == 2) echo "selected"; ?>>Touring</option>
                                    <option value="3" <?php if($category == 3) echo "selected"; ?>>Scooter</option>
                                    <option value="4" <?php if($category == 4) echo "selected"; ?>>Naked</option>
                                    <option value="5" <?php if($category == 5) echo "selected"; ?>>Enduro</option>
                                    <option value="6" <?php if($category == 6) echo "selected"; ?>>Electric</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                
                <div class="col-3"></div>
                    <div class="col-6">
                        <div class="text-center">
                            <input type="hidden" name="current_image" value="<?php echo $current_image ?>">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input  class="btn btn-success" type="submit" name="submit" value="Update Bike"></input>
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
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $harga = $_POST['harga'];
        $year = $_POST['year'];
        $cc = $_POST['cc'];
        $current_image = $_POST['current_image'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];
        $brand = $_POST['brand'];
        $category = $_POST['category'];

        
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "")
        {
            $image_name = $_FILES['image']['name'];

            $part = explode('.', $image_name);
            $ext = end($part);
            $image_name = "Bike_img_".rand(000, 999).'.'.$ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/bikes/".$image_name;
            $upload = move_uploaded_file($source_path, $destination_path);
            
            if($upload == false)
            {
                $_SESSION['upload'] = "<div class='notice-text-failed'>Failed to Upload Image</div>";
                header('location:'.SITEURL.'admin/manage-categories.php');
                die();
            }

            if($current_image != "")
            {
                $remove_path = "../images/bikes/".$current_image;
                $remove = unlink($remove_path);

                if($remove == false)
                {
                    $_SESSION['failed-remove'] = "<div class='notice-text-failed'>Failed to Remove Current Image</div>";
                    header('location:'.SITEURL.'admin/manage-categories.php');
                    die();
                }
            }
        }
        else
        {
            $image_name = $current_image;
        }

        $sql = "UPDATE bikes 
                SET name=?, price=?, harga=?, year=?, cc=?, featured=?, active=?, brand_id=?, category_id=?, bike_image=?
                WHERE bike_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssssssi", $name, $price, $harga, $year, $cc, $featured, $active, $brand, $category, $image_name, $id);

                $stmt->execute();

        if($stmt->affected_rows == 1 ) {
            $_SESSION['add'] = "<div class='notice-text-success'>Bike Update Successfully</div>";
            header('location:'.SITEURL.'admin/manage-bikes.php');
        } else {
            $_SESSION['add'] = "<div class='notice-text-failed'>Failed To Update Bike, Please Try Again Later</div>";
            header('location:'.SITEURL.'admin/manage-bikes.php');
        }
    }

    ?>

<?php 
    include('./partials/footer.php')
?>