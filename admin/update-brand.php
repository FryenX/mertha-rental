<?php 
    include('./partials/header.php')
?>

    <div class="container padding-top padding-content">
        <h1 class="padding-title text-center">Update Brand</h1>
        
        <div class="">
            <?php 
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM brands WHERE brand_id=$id";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        $row = mysqli_fetch_assoc($res);
                        $name = $row['name'];
                        $current_image = $row['brand_image'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    }
                    else
                    {   
                        $_SESSION['no-brand-found'] = "<div class=notice-text-failed>Brand Not Found.</div>";
                        header('location:'.SITEURL.'admin/manage-brands.php');
                    }
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-brands.php');
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
                                            <img src="<?php echo SITEURL; ?>images/brand/<?php echo $current_image ?>" style="width: 200px;">
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
                    <div class="col-6">
                        <div class="text-center">
                            <input type="hidden" name="current_image" value="<?php echo $current_image ?>">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input  class="btn btn-success" type="submit" name="submit" value="Update Brand"></input>
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
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                
                if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "")
                {
                    $image_name = $_FILES['image']['name'];

                    $part = explode('.', $image_name);
                    $ext = end($part);
                    $image_name = "Bike_Brand_".rand(000, 999).'.'.$ext;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/brand/".$image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);
                    
                    if($upload == false)
                    {
                        $_SESSION['upload'] = "<div class='notice-text-failed'>Failed to Upload Image</div>";
                        header('location:'.SITEURL.'admin/manage-brands.php');
                        die();
                    }

                    if($current_image != "")
                    {
                        $remove_path = "../images/brand/".$current_image;
                        $remove = unlink($remove_path);

                        if($remove == false)
                        {
                            $_SESSION['failed-remove'] = "<div class='notice-text-failed'>Failed to Remove Current Image</div>";
                            header('location:'.SITEURL.'admin/manage-brands.php');
                            die();
                        }
                    }
                }
                else
                {
                    $image_name = $current_image;
                }

                $sql2 = "UPDATE brands SET
                    name = '$name',
                    brand_image = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE brand_id = $id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == TRUE)
                {
                    $_SESSION['update'] = "<div class='notice-text-success'>Brand Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-brands.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='notice-text-failed'>Failed to Update Brand, Please Try Again Later.</div>";
                    header('location:'.SITEURL.'admin/manage-brands.php');
                }
            }


    ?>

<?php 
    include('./partials/footer.php')
?>