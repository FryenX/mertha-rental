<?php 
    include('partials/header.php')
?>

    <div class="container padding-top padding-content">
        <h1 class="padding-title text-center">Manage Brands</h1>
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
            <a href="<?php echo SITEURL; ?>admin/add-brands.php" class="btn btn-primary">Add Brand</a>
        </div>
        <div class="row tb-header">
            <div class="col-1">
                S.N.
            </div>
            <div class="col-2">
                Category Name
            </div>
            <div class="col-2 text-center">
                Category Image
            </div>
            <div class="col-2 text-center">
                Featured
            </div>
            <div class="col-2 text-center">
                Active
            </div>
            <div class="col-3">
                Action
            </div>
        </div>

        <?php 

            $sql = "SELECT * FROM brands";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn=1;

            if($count>0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['brand_id'];
                    $name = $row['name'];
                    $brand_image = $row['brand_image'];
                    $featured = $row['featured'];
                    $active = $row['active'];

                    ?>
                        <div class="row tb-content">
                            <div class="col-1">
                                <?php echo $sn++; ?>
                            </div>
                            <div class="col-2">
                                <?php echo $name ?>
                            </div>

                            <div class="col-2 align-items-center d-flex justify-content-center">
                                <?php 
                                    if($brand_image!="")
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images/brand/<?php echo $brand_image; ?>" style="width: 100px;">
                                        <?php
                                    }
                                    else
                                    {
                                        echo "<div class='notice-text-failed'>No Image Found</div>";
                                    }
                                ?>
                            </div>

                            <div class="col-2 text-center">
                                <?php echo $featured ?>
                            </div>
                            <div class="col-2 text-center">
                                <?php echo $active ?>
                            </div>
                            <div class="col-3">
                                <a href="<?php echo SITEURL; ?>admin/update-brand.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Brand</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-brand.php?id=<?php echo $id; ?>&brand_image=<?php echo $brand_image; ?>" class="btn btn-danger">Delete Brand</a>
                            </div>
                        </div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="notice-text-failed text-center">No Brand Added</div>
                <?php
            }

        ?>
    </div>

<?php 
    include('partials/footer.php')
?>