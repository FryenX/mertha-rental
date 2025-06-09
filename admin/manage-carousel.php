<?php 
    include('partials/header.php')
?>

    <div class="container padding-top padding-content">
        <h1 class="padding-title text-center">Manage Carousel</h1>

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
            <a href="<?php echo SITEURL; ?>admin/add-carousel.php" class="btn btn-primary">Add Carousel</a>
        </div>
        <div class="row tb-header">
            <div class="col-1">
                S.N.
            </div>
            <div class="col-2">
                Title
            </div>
            <div class="col-2">
                Carousel Image
            </div>
            <div class="col-2">
                Description
            </div>
            <div class="col-1">
                Featured
            </div>
            <div class="col-1">
                Active
            </div>
            <div class="col-3">
                Action
            </div>
        </div>

        <?php 
            $sql = "SELECT * FROM carousel";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn=1;


            if($count>0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['carousel_id'];
                    $title = $row['carousel_title'];
                    $carousel_image = $row['carousel_image'];
                    $description = $row['carousel_description'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    

                    if (!function_exists('truncateDescription')) {
                        function truncateDescription($description, $limit) {
                            if (strlen($description) <= $limit) {
                                return $description;
                            } else {
                                $truncated = substr($description, 0, $limit);
                                $lastSpace = strrpos($truncated, ' ');
                                return substr($truncated, 0, $lastSpace) . '...';
                            }
                        }
                    }
                    
                    // Assuming $description is defined and contains the description text
                    $truncatedDescription = truncateDescription($description, 100);

                    ?>
                        <div class="row tb-content">
                            <div class="col-1">
                                <?php echo $sn++ ?>
                            </div>
                            <div class="col-2">
                                <?php echo $title ?>
                            </div>
                            <div class="col-2 ">
                                <?php 
                                    if($carousel_image!="")
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images/carousel/<?php echo $carousel_image; ?>" style="width: 100%;">
                                        <?php
                                    }
                                    else
                                    {
                                        echo "<div class='notice-text-failed'>No Image Found</div>";
                                    }
                                ?>
                            </div>
                            <div class="col-2">
                                <p class="text-break"><?php echo $truncatedDescription ?></p>
                            </div>
                            <div class="col-1">
                                <?php echo $featured ?>
                            </div>
                            <div class="col-1">
                                <?php echo $active ?>
                            </div>
                            <div class="col-3 btn-category">
                                <a href="<?php echo SITEURL; ?>admin/update-carousel.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Carousel</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-carousel.php?id=<?php echo $id; ?>&carousel_image=<?php echo $carousel_image; ?>" class="btn btn-danger">Delete Carousel</a>
                            </div>
                        </div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="notice-text-failed text-center">No Carousel Added</div>
                <?php
            }
        ?>

        
    </div>

<?php 
    include('partials/footer.php')
?>