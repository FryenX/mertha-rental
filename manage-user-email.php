<?php include('./partials-frontend/header.php'); ?>

    <section class="header-menu">
        <div class="top-filler">
        <img src="./images/filler/ramevespa1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover; ">
        </div>
    </section>

    <div class="container padding-top rent-bike padding-content">
        <h1 class="padding-title text-center">Change Email</h1>
        <div class="text-center mb-3">
            <?php 
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                }

                if(isset($_SESSION['email-not-found']))
                {
                    echo $_SESSION['email-not-found'];
                    unset($_SESSION['email-not-found']);
                }

                if(isset($_SESSION['email-not-match']))
                {
                    echo $_SESSION['email-not-match'];
                    unset($_SESSION['email-not-match']);
                }
            ?>
        </div>

        <form action="" method="POST">
        <div class="row">
                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>Current Email</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="email" name="current_email" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                <div class="col-3"></div>
                    <div class="col-6 d-flex mb-3">
                        <div class="col-sm-3">
                            <h6>New Email</h6>
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                <input type="email" name="new_email" class="form-control form-control-lg bg-light fs-6">
                            </div>
                        </div>
                    </div>
                <div class="col-3"></div>

                
                <div class="col-3"></div>
                    <div class="col-6">
                        <div class="text-center">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input class="btn btn-success" type="submit" name="submit" value="Change Email"></input>
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
            $current_email=$_POST['current_email'];
            $new_email=$_POST['new_email'];

            $sql = "SELECT * FROM user WHERE user_id=$id AND email='$current_email'";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count=mysqli_num_rows($res);
                
                if($count==1)
                {
                    if($new_email!=="")
                    {
                        $sql2 = "UPDATE user SET
                            email='$new_email'
                            WHERE user_id=$id
                        ";

                        $res2 = mysqli_query($conn, $sql2);

                        if($res2==True)
                        {
                            $_SESSION['change-email'] = "<div class='notice-text-success'>Email Changed Successfully. </div>";

                            header('location:'.SITEURL.'profile.php?user_id='.$id);
                        }
                        else
                        {
                            $_SESSION['change-email'] = "<div class='notice-text-failed'>Failed to Change Email. </div>";

                            header('location:'.SITEURL.'profile.php?user_id='.$id);
                        }
                    }
                    else
                    {
                        $_SESSION['email-not-match'] = "<div class='notice-text-failed'>Email Did Not Match. </div>";

                    }
                }
                else
                {
                    $_SESSION['email-not-found'] = "<div class='notice-text-failed'>Current Email is wrong. </div>";

                }
            }

        }
    ?>

<?php include('./partials-frontend/footer.php') ?>