<?php 
    include('./config/constant.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mertha Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="icon" href="./images/logo/mertha_logo.png" type="image/png" size="20x20">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand text-white" href="#"><img src="./images/logo/mertha_logo.png" alt="" style="width: 50px; height: 50px; line-height: 10px;"></a>
        <button class="navbar-toggler nav-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">
                    <?php if (isset($_SESSION['login-user'])): ?>
                        <?php 
                            $user_id = $_SESSION['user_id'];
                            $sql = "SELECT uid ,user_image FROM user WHERE user_id = $user_id";
                            $res = mysqli_query($conn, $sql);

                            if ($res == TRUE) {
                                $row = mysqli_fetch_assoc($res);
                                $user_image = $row['user_image'];
                                $uid = $row['uid'];
                            }
                        ?>
                        <a href="<?php echo SITEURL; ?>profile.php?user_id=<?php echo $uid ?>" class="">
                        <?php if (!empty($user_image)): ?>
                            <img src="<?php echo SITEURL; ?>images/user/<?php echo $user_image; ?>" alt="User Image" style="width: 40px; object-fit:cover; height: 40px; border-radius: 50%;">
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 40px; height: 40px; border-radius: 50%; background-color: #E76F51;">
                                <path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" style="fill: white;"/>
                            </svg>
                        <?php endif; ?>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo SITEURL; ?>login.php" class="login-btn">Login</a>
                    <?php endif; ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white underline-on-hover" aria-current="page" href="<?php echo SITEURL; ?>">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                                BRANDS
                            </a>
                            <ul class="dropdown-menu">
                                <?php 
                                    $sql_brand = "SELECT * FROM brands";

                                    $res_brand = mysqli_query($conn, $sql_brand);

                                    $count_brand = mysqli_num_rows($res_brand);

                                    if($count_brand>0)
                                    {
                                        while ($row_brand=mysqli_fetch_assoc($res_brand))
                                        {
                                            $brand_id = $row_brand['brand_id'];
                                            $brand_name = $row_brand['name'];
                                        ?>

                                            <li><a class="dropdown-item fs-8" href="<?php echo SITEURL; ?>brands.php?id=<?php echo $brand_id ?>"><?php echo $brand_name ?></a></li>

                                        <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<li><a class='dropdown-item fs-8' href='#'>No Brands Added</a></li>";
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white underline-on-hover" href="<?php echo SITEURL; ?>categories.php">CATEGORIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white underline-on-hover" href="<?php echo SITEURL; ?>bikes.php">BIKES</a>
                        </li>
                        <?php if (isset($_SESSION['login-user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white underline-on-hover" href="<?php echo SITEURL; ?>orders.php">ORDERS</a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link text-white underline-on-hover" href="<?php echo SITEURL; ?>faq.php">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white underline-on-hover" href="#contact">CONTACT</a>
                        </li>
                    </ul>
                    <form class="d-flex searchbar" name="search" method="POST" action="<?php echo SITEURL; ?>bike-search.php" role="search">
                        <input class="border-search me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <?php if (isset($_SESSION['login-user'])): ?>
                        <?php 
                            $user_id = $_SESSION['user_id'];
                            $sql = "SELECT uid ,user_image FROM user WHERE user_id = $user_id";
                            $res = mysqli_query($conn, $sql);

                            if ($res == TRUE) {
                                $row = mysqli_fetch_assoc($res);
                                $user_image = $row['user_image'];
                                $uid = $row['uid'];
                            }
                        ?>
                        <a href="<?php echo SITEURL; ?>profile.php?user_id=<?php echo $uid ?>" id="icon-user" class="">
                        <?php if (!empty($user_image)): ?>
                            <img src="<?php echo SITEURL; ?>images/user/<?php echo $user_image; ?>" alt="User Image" style="width: 40px; object-fit:cover; height: 40px; border-radius: 50%;">
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 40px; height: 40px; border-radius: 50%; background-color: #E76F51;">
                                <path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" style="fill: white;"/>
                            </svg>
                        <?php endif; ?>
                        </a>
                    <?php else: ?>
                        <a id="icon-user" href="<?php echo SITEURL; ?>login.php" class="login-btn">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>
