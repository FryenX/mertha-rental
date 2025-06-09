<?php 
    include('./partials-frontend/header.php');

    if (isset($_GET['user_id'])) 
    {
        $uid = $_GET['user_id'];
    } 
    else 
    {
        echo "User ID is not set.";
        exit;
    }

    
    
    $sql = "SELECT * FROM user WHERE uid = '$uid'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $id = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $password = $row['password'];
        $phone = $row['phone'];
        $street = $row['street'];
        $district = $row['district'];
        $city = $row['city'];
        $zip_code = $row['zip_code'];
        $current_image = $row['user_image'];
    } else {
        header('location:'.SITEURL.'index.php');
        exit;
    }
?>

    <section class="header-menu">
        <div class="top-filler">
        <img src="./images/filler/ramevespa1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover; ">
        </div>
    </section>

    <div class="container">
        <div class="rent-bike">
            <h1 class="text-center padding-title">Your Account</h1>
            <div class="text-center">
                <?php 
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
                }

                if(isset($_SESSION['failed-remove']))
                {
                    echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset( $_SESSION['delete']))
                {
                    echo  $_SESSION['delete'];
                    unset ( $_SESSION['delete']);
                }

                if(isset( $_SESSION['change-pass']))
                {
                    echo  $_SESSION['change-pass'];
                    unset ( $_SESSION['change-pass']);
                }

                if(isset( $_SESSION['change-email']))
                {
                    echo  $_SESSION['change-email'];
                    unset ( $_SESSION['change-email']);
                }

                
                ?>
            </div>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-4 text-center">
                <div id="image-container" class="image-container mb-5 d-flex flex-column align-items-center justify-content-center">
                    <?php if ($current_image != ""): ?>
                        <img id="uploaded-image" src="<?php echo SITEURL; ?>images/user/<?php echo $current_image; ?>" alt="User Image" class="mb-5" style="border-radius: 100px; width: 200px; height: 200px; object-fit: cover;">
                        <div class="col-sm-6 text-center d-flex m-auto">
                            <a href="<?php echo SITEURL; ?>delete-user-profile.php?id=<?php echo $uid; ?>&user_image=<?php echo $current_image; ?>" class="btn btn-danger w-100">Delete Picture</a>
                        </div>
                    <?php else: ?>
                        <svg id="default-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 200px; height: 200px; border-radius: 100px;">
                            <path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" style="fill: black;"/>
                        </svg>
                    <?php endif; ?>
                </div>
                    <div class="col-sm-6 text-center d-flex m-auto mb-3">
                        <input class="form-control form-control-sm" id="formFileSm" name="image" type="file" onchange="handleFileUpload(event)">
                    </div>
                </div>
                <div class="col-8 padding-content">
                    <div class="mb-3">
                        <h6>First Name</h6>
                        <input class="form-control" type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" aria-label="Disabled input example">
                    </div>
                    <div class="mb-3">
                        <h6>Last Name</h6>
                        <input class="form-control" type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" aria-label="Disabled input example">
                    </div>
                    <div class="row">
                        <div class="mb-0 col-8">
                            <h6>Email</h6>
                            <input class="form-control" type="text" name="email" value="*************************" aria-label="Disabled input example" disabled>
                        </div>
                        <div class="col-4 mb-3">
                            <h6 class="text-white">p</h6>
                        <a href="<?php echo SITEURL; ?>manage-user-email.php?id=<?php echo $id; ?>" class="btn btn-secondary w-100">Change Email</a>
                        </div>
                        <div class="mb-0 col-8">
                            <h6>Password</h6>
                            <input class="form-control" type="password" name="password" value="placeholderpassword" aria-label="Disabled input example" disabled>
                        </div>
                        <div class="col-4 mb-3">
                            <h6 class="text-white">p</h6>
                        <a href="<?php echo SITEURL; ?>manage-user-password.php?id=<?php echo $id; ?>" class="btn btn-secondary w-100">Change Password</a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6>Phone</h6>
                        <input class="form-control" type="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" placeholder="No phone Added Yet" aria-label="Disabled input example">
                    </div>
                    <div class="mb-3">
                        <h6>Street</h6>
                        <textarea class="form-control" name="street" placeholder="No Street Added Yet" rows="3"><?php echo htmlspecialchars($street); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <h6>District</h6>
                        <input class="form-control" name="district" type="text" value="<?php echo htmlspecialchars($district); ?>" placeholder="No District Added Yet" aria-label="Disabled input example">
                    </div>
                    <div class="mb-3">
                        <h6>City</h6>
                        <input class="form-control" name="city" type="text" value="<?php echo htmlspecialchars($city); ?>" placeholder="No City Added Yet">
                    </div>
                    <div class="mb-3">
                        <h6>Zip Code</h6>
                        <input class="form-control" name="zip_code" type="text" value="<?php echo htmlspecialchars($zip_code); ?>" placeholder="No Zip Code Added Yet" aria-label="Disabled input example" >
                    </div>
                </div>
                <div class="col text-center padding-content">
                    <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($current_image); ?>">
                    <input type="hidden" name="update_id" value="<?php echo htmlspecialchars($user_id); ?>">
                    <input type="submit" class="btn btn-primary" name="edit-profile" value="Apply Changes">
                    <a class="btn btn-danger" href="./logout.php">Sign Out</a>
                </div>
            </div>
        </form>
    </div>

    <?php 
        if (isset($_POST['edit-profile'])) {

                $user_id = $_POST['update_id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $current_image = $_POST['current_image'];
                $phone = $_POST['phone'];
                $street = $_POST['street'];
                $district = $_POST['district'];
                $city = $_POST['city'];
                $zip_code = $_POST['zip_code'];
                
                if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
                    $image_name = $_FILES['image']['name'];
            
                    $part = explode('.', $image_name);
                    $ext = end($part);
                    $image_name = "User_" . rand(000, 999) . '.' . $ext;
            
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "./images/user/" . $image_name;
            
                    $upload = move_uploaded_file($source_path, $destination_path);
            
                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='notice-text-failed'>Failed to Upload Image</div>";
                        header('location:' . SITEURL . 'profile.php?user_id=' . $uid);
                        exit();
                    }
            
                    if ($current_image != "" && file_exists("./images/user/" . $current_image)) {
                        $remove_path = "./images/user/" . $current_image;
                        $remove = unlink($remove_path);
            
                        if ($remove == false) {
                            $_SESSION['failed-remove'] = "<div class='notice-text-failed'>Failed to Remove Current Image</div>";
                            header('location:' . SITEURL . 'profile.php?user_id=' . $uid);
                            exit();
                        }
                    }
                } else {
                    $image_name = $current_image;
                }

                $sql2 = "UPDATE user SET
                    first_name = '$first_name',
                    last_name = '$last_name',
                    user_image = '$image_name',
                    phone = '$phone',
                    street = '$street',
                    district = '$district',
                    city = '$city',
                    zip_code = '$zip_code'
                    WHERE user_id = $user_id
                ";
                
                $res2 = mysqli_query($conn, $sql2);

                if($res2 == TRUE)
                {
                    $_SESSION['update'] = "<div class='notice-text-success'>Profile Updated Successfully.</div>";
                    header('location:'.SITEURL.'profile.php?user_id='.$uid);
                }
                else
                {
                    $_SESSION['update'] = "<div class='notice-text-failed'>Failed to Update Profile, Please Try Again Later.</div>";
                    header('location:'.SITEURL.'profile.php?user_id='.$uid);
                }
        }
    ?>


        

<?php 
    include('./partials-frontend/footer.php');
?>

<script>
    function handleFileUpload(event) {
        const fileInput = event.target;
        const imageContainer = document.getElementById('image-container');
        const uploadedImage = document.getElementById('uploaded-image');
        const defaultIcon = document.getElementById('default-icon');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                if (uploadedImage) {
                    uploadedImage.src = e.target.result;
                    uploadedImage.style.display = 'block';
                } else {
                    // Create a new image element if it doesn't exist
                    const newImage = document.createElement('img');
                    newImage.id = 'uploaded-image';
                    newImage.src = e.target.result;
                    newImage.className = 'mb-5';
                    newImage.style.borderRadius = '100px';
                    newImage.style.width = '200px';
                    newImage.style.height = '200px';
                    newImage.style.objectFit = 'cover';
                    imageContainer.appendChild(newImage);
                }
                if (defaultIcon) {
                    defaultIcon.style.display = 'none';
                }
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            if (uploadedImage) {
                uploadedImage.style.display = 'none';
            }
            if (defaultIcon) {
                defaultIcon.style.display = 'block';
            }
        }
    }
</script>