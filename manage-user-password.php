<?php include('./partials-frontend/header.php'); ?>

    <section class="header-menu">
        <div class="top-filler">
        <img src="./images/filler/ramevespa1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover; ">
        </div>
    </section>
    
    <div class="container padding-top rent-bike padding-content">
        <h1 class="padding-title text-center">Change Password</h1>
        <div class="text-center mb-3">
            <?php 
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['pass-not-match']))
                {
                    echo $_SESSION['pass-not-match'];
                    unset($_SESSION['pass-not-match']);
                }
                
            ?>
        </div>

        <form action="" method="POST">
        <div class="row">
                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Current Password</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="password" name="current_password" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>New Password</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="password" name="new_password" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Confirm Password</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="password" name="confirm_password" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>
                
                <div class="col-3"></div>
                    <div class="col-6">
                        <div class="text-center">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input class="btn btn-success" type="submit" name="submit" value="Change Password"></input>
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
            $id=$_POST['id'];
            $current_password=md5($_POST['current_password']);
            $new_password=md5($_POST['new_password']);
            $confirm_password=md5($_POST['confirm_password']);

            $sql = "SELECT * FROM user WHERE user_id=$id AND password='$current_password'";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count=mysqli_num_rows($res);
                
                if($count==1)
                {
                    if($new_password==$confirm_password)
                    {
                        $sql2 = "UPDATE user SET
                            password='$new_password'
                            WHERE user_id=$id
                        ";

                        $res2 = mysqli_query($conn, $sql2);

                        if($res2==True)
                        {
                            $_SESSION['change-pass'] = "<div class='notice-text-success'>Password Changed Successfully. </div>";

                            header('location:'.SITEURL.'profile.php?user_id='.$id);
                        }
                        else
                        {
                            $_SESSION['change-pass'] = "<div class='notice-text-failed'>Failed to Change Password. </div>";

                            header('location:'.SITEURL.'profile.php?user_id='.$id);
                        }
                    }
                    else
                    {
                        $_SESSION['pass-not-match'] = "<div class='notice-text-failed'>Password Did Not Match. </div>";

                    }
                }
                else
                {
                    $_SESSION['user-not-found'] = "<div class='notice-text-failed'>Current password is wrong. </div>";

                }
            }

        }
    ?>

<?php include('./partials-frontend/footer.php') ?>