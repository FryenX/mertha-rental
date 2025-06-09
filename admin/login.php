<?php 
    include('../config/constant.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,30 0;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box position-relative" style="background: #E76F51;">
                <div class="featured-image mb-3">
                    <img src="../login-images/yamahar15.png" alt="...">
                </div>
                <div class="login-text">
                    <p class="fs-2 text-white">Be verified</p>
                    <small class="text-white text-wrap text-center" style="width: 17rem;">Make sure to give the right login credential</small>
                </div>
            </div>
            <div class="col-md-6 right-box">
            <form action="" method="POST">
                    <div class="row align-items-center position-relative">
                        <div class="header-text mb-4 d-flex justify-content-between">
                            <div class="title">
                                <p>Hello Admin</p>
                                <p>Please Login before proceeding any further.</p>
                            </div>
                            <div class="close-btn">
                                <a href="<?php echo SITEURL; ?>index.php"><i class="fa-solid fa-x" style="color: black;"></i></a>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" placeholder="Enter You Username"> 
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password"> 
                        </div>
                        <div class="input-group mb-2 d-flex justify-content-between">
                        </div>
                        <div class="input-group position-relative">
                            <div class="row mb-2 position-absolute">
                                    <?php
                                        if(isset($_SESSION['login']))
                                        {
                                            echo $_SESSION['login'];
                                            unset ($_SESSION['login']);
                                        }

                                        if(isset($_SESSION['no-login-message']))
                                        {
                                            echo $_SESSION['no-login-message'];
                                            unset ($_SESSION['no-login-message']);
                                        }
                                    ?>
                            </div>
                            <h6 class="text-white">p</h6>
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" name="submit" value="Login" class="btn btn-lg rent-btn w-100 fs-6"></input>
                        </div>
                        <div class="row">
                            <small>Created to finish Exam Project</a></small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";


            $_SESSION['first_name'] = $first_name;

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $admin_id = $row['admin_id'];
                $_SESSION['admin_id'] = $admin_id;
                $first_name = $row['first_name'];
                $_SESSION['first_name'] = $first_name;
                $_SESSION['login'] = "<div class='notice-text-success'>Login Succesful</div>";
                $_SESSION['user'] = $username;

                header('location:'.SITEURL.'admin/');
            }
            else
            {
                $_SESSION['login'] = "<div class='notice-text-failed'>Username or Password did not match</div>";

                header('location:'.SITEURL.'admin/login.php');
            }
        }
    ?>

    </body>
</html>