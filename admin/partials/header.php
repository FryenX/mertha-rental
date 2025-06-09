
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include('../config/constant.php');
        include('login-check.php');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mertha Rentals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../images/logo/mertha_logo.png" type="image/png" size="20x20">
</head>
<body>
    <nav class="navbar navbar-expand-lg main-color">
    <div class="container">
            <a class="navbar-brand text-white" href="#"><img src="../images/logo/mertha_logo.png" alt="" style="width: 50px; height: 50px; line-height: 10px;"></a>
        <button class="navbar-toggler nav-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="index.php">HOME</a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="manage-admins.php">ADMINS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="manage-carousel.php">CAROUSEL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="manage-categories.php">CATEGORIES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="manage-brands.php">BRANDS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="manage-bikes.php">BIKES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="manage-orders.php">ORDERS</a>
                            </li>
                        </ul>
                    <?php 
                    if (isset($_SESSION['first_name'])) {
                        echo '<a href="logout.php" class="login-btn">Logout (' . $_SESSION['first_name'] . ')</a>';
                    } else {
                        echo '<a href="login.php" class="login-btn">Login</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>