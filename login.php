<?php 
    include('./partials-login/header.php');
    
?>

<body>


    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box position-relative" style="background: #E76F51;">
                <div class="featured-image mb-3">
                    <img src="./login-images/yamahar15.png" alt="...">
                </div>
                <div class="login-text">
                    <p class="fs-2 text-white">Be verified</p>
                    <small class="text-white text-wrap text-center" style="width: 17rem;">Make sure to give the right login credential</small>
                </div>
            </div>
            <div class="col-md-6 right-box">
                <form action="" method="POST">
                    <div class="row align-items-center">
                        <div class="header-text mb-4 d-flex justify-content-between">
                            <div class="title">
                                <p>Hello, Again</p>
                                <p>We are happy to have you back.</p>
                            </div>
                            <div class="close-btn">
                                <a href="<?php echo SITEURL; ?>index.php"><i class="fa-solid fa-x" style="color: black;"></i></a>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" id="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email addres"> 
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" name="password" id="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                        </div>
                        <div class="input-group mb-4 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                            </div>
                            <div class="forgot">
                                <small><a href="#">Forgot Password?</a></small>
                            </div>
                        </div>
                        <div class="input-group position-relative">
                            <div class="row mb-2 position-absolute message-container">
                                    <?php
                                        if(isset($_SESSION['login-user']))
                                        {
                                            echo $_SESSION['login-user'];
                                            unset ($_SESSION['login-user']);
                                        }

                                        if(isset($_SESSION['no-login-message-user']))
                                        {
                                            echo $_SESSION['no-login-message-user'];
                                            unset ($_SESSION['no-login-message-user']);
                                        }
                                    ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" value="login" name="login-user" class="btn btn-lg rent-btn w-100 fs-6"></input>
                        </div>
                        <div class="row">
                            <small>Don't have account? <a href="<?php echo SITEURL; ?>signup.php">Sign Up</a></small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <?php 
            if(isset($_POST['login-user']))
            {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $user_id = $row['user_id'];
                $_SESSION['user_id'] = $user_id;
                $_SESSION['login-user'] = "<div class='notice-text-success'>Login Succesful</div>";
                $_SESSION['user-user'] = $email;

                header('location:'.SITEURL.'index.php');
            }
            else
                {
                    $_SESSION['login-user'] = "<div class='notice-text-failed'>Email or Password did not match</div>";

                    header('location:'.SITEURL.'login.php');
                }
            }
            
        ?>


    </body>
</html>