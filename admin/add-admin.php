<?php 
    include('partials/header.php')
?>
    <div class="container padding-top padding-content">
        <h1 class="padding-title text-center">Add Admin</h1>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
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
                                <input type="text" name="first_name" placeholder="Enter first name" class="form-control form-control-lg bg-light fs-6">
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
                                <input type="text" name="last_name" placeholder="Enter last name" class="form-control form-control-lg bg-light fs-6">
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
                                <input type="text" name="username" placeholder="Enter username" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Password</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="password" name="password" placeholder="Enter password" class="form-control form-control-lg bg-light fs-6">
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
    include('partials/footer.php')
?>

<?php 
    if (isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
    
        $sql = "INSERT INTO admins (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";
    
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='notice-text-success'> Admin Added Successfully </div>";

            header("location:".SITEURL.'admin/manage-admins.php');
            ob_end_flush();
        }
        else
        {
            $_SESSION['add'] = "<div class='notice-text-success'> Failed to Add Admin </div>";

            header("location:".SITEURL.'admin/add-admin.php');
            ob_end_flush();
        }
    
    }
    
?>
