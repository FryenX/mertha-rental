<?php include('./partials/header.php'); ?>

    <div class="container padding-top padding-content">
        <h1 class="text-center padding-title">Update Admin</h1>


        <?php 
            $id=$_GET['id'];

            $sql="SELECT * FROM admins WHERE admin_id=$id";

            $res=mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $username = $row['username'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-admins.php');
                }
            }
        ?>

        <form action="" method="POST">
        <div class="row">
                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>First name</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="text" name="first_name" value="<?php echo $first_name; ?>" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Last name</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="text" name="last_name" value="<?php echo $last_name; ?>" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Username</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>
                
                <div class="col-3"></div>
                    <div class="col-6">
                        <div class="text-center">
                            <input class="btn btn-success" type="submit" name="submit" value="Add Admin"></input>
                            <input class="btn btn-danger" type="reset" name="reset" value="reset"></input>
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
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $username = $_POST['username'];

            $sql = "UPDATE admins SET
            first_name = '$first_name',
            last_name = '$last_name',
            username = '$username'
            WHERE admin_id='$id'
            ";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $_SESSION['update'] = "<div class='notice-text-success'> Admin Updated Successfully </div>";

                header('location:'.SITEURL.'admin/manage-admins.php');
            }
            else
            {
                $_SESSION['update'] = "<div class='notice-text-failed'> Admin Can't Be Updated, Please Try Again Later </div>";

                header('location:'.SITEURL.'admin/manage-admins.php');
            }
        }
    ?>

<?php include('./partials/footer.php'); ?>