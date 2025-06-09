<?php 
    include('./partials/header.php')
?>

    <div class="container padding-top padding-content position-relative">
        <h1 class="padding-title text-center">Add Carousel</h1>

        <div class="text-center">
            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset ($_SESSION['add']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset ($_SESSION['upload']);
                }
            ?>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row padding-top-2">
                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Carousel Title</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="text" name="title" placeholder="Carousel Title" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Description</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex" >
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Category Image</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="file" name="image" class="form-control form-control-lg bg-light fs-6">
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
                    <div class="col-6">
                        <div class="text-center">
                            <input class="btn btn-success" type="submit" name="submit" value="Add Carousel"></input>
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
            $title = $_POST['title'];
            $description = $_POST['description'];

            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No";
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No";
            }

            if(isset($_FILES['image']['name']))
            {
                $image_name = $_FILES['image']['name'];

                if($image_name !="")
                {

                    $part = explode('.', $image_name);
                    $ext = end($part);
                    $image_name = "Bike_Carousel_".rand(000, 999).'.'.$ext;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/carousel/".$image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);
                    if($upload==False)
                    {
                        $_SESSION['upload'] = "<div class='notice-text-failed'>Failed to Upload Image</div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }

                }
            }
            else
            {
                $image_name = "";
            }

            $sql = "INSERT INTO carousel SET
                carousel_title='$title',
                carousel_description='$description',
                carousel_image='$image_name',
                featured='$featured',
                active='$active'
            ";
                $res = mysqli_query($conn, $sql);

                if($res==TRUE)
                {
                    $_SESSION['add'] = "<div class='notice-text-success'>Carousel Added Successfully</div>";

                    header('location:'.SITEURL.'admin/manage-carousel.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='notice-text-failed'>Failed To Add Carousel, Please Try Again Later</div>";

                    header('location:'.SITEURL.'admin/manage-carousel.php');
                }

        }

    ?>

<?php 
    include('./partials/footer.php')
?>