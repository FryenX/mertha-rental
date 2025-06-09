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
                <small class="text-white text-wrap text-center" style="width: 17rem;">Make sure to give the right login credentials</small>
            </div>
        </div>
        <div class="col-md-6 right-box">
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
                <form action="" method="POST" enctype="multipart/form-data" id="signupForm">
                    <div class="input-group">
                        <input type="text" name="first_name" id="firstName" class="form-control form-control-lg bg-light fs-6" placeholder="First name"> 
                    </div>
                        <div class="notice-height">
                            <small class="text-danger" id="firstNameError"></small>
                        </div>
                    <div class="input-group">
                        <input type="text" name="last_name"  id="lastName" class="form-control form-control-lg bg-light fs-6" placeholder="Last name">
                    </div>
                    <div class="notice-height">
                        <small class="text-danger" id="lastNameError"></small>
                    </div>
                    <div class="input-group">
                        <input type="text" name="email" id="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email address"> 
                    </div>
                    <div class="notice-height">
                        <small class="text-danger" id="emailError"></small>
                    </div>
                    <div class="input-group">
                        <input type="number" name="phone" id="phone" class="form-control form-control-lg bg-light fs-6" placeholder="Phone number"> 
                    </div>
                    <div class="notice-height">
                        <small class="text-danger" id="phoneError"></small>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password"> 
                    </div>
                    <div class="notice-height">
                        <small class="text-danger" id="passwordError"></small>
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" name="confirm_password" id="confirmPassword" class="form-control form-control-lg bg-light fs-6" placeholder="Confirm password"> 
                        <input type="hidden" name="uid" value="<?php echo rand(000000, 999999) ?>">
                    </div>
                    <div class="notice-height">
                        <small class="text-danger" id="confirmPasswordError"></small>
                    </div>
                    <div class="input-group mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                        </div>
                        <div class="forgot">
                            <small><a href="#">Forgot Password?</a></small>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" name="signup" class="btn rent-btn rent-bike-btn w-100" value="Sign up">
                    </div>
                    <div class="row mb-0">
                        <small>Already have an account? <a href="<?php echo SITEURL; ?>/login.php">Login</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        document.getElementById('signupForm').addEventListener('submit', function(event) {
        let isValid = true;

        // Clear previous error messages
        document.getElementById('firstNameError').textContent = '';
        document.getElementById('lastNameError').textContent = '';
        document.getElementById('emailError').textContent = '';
        document.getElementById('phoneError').textContent = '';
        document.getElementById('passwordError').textContent = '';
        document.getElementById('confirmPasswordError').textContent = '';

        // Validate first name
        const firstName = document.getElementById('firstName').value;
        if (firstName.trim() === '') {
            document.getElementById('firstNameError').textContent = 'First name is required';
            isValid = false;
        }

        // Validate last name
        const lastName = document.getElementById('lastName').value;
        if (lastName.trim() === '') {
            document.getElementById('lastNameError').textContent = 'Last name is required';
            isValid = false;
        }

        // Validate email
        const email = document.getElementById('email').value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            document.getElementById('emailError').textContent = 'Enter a valid email address';
            isValid = false;
        }

        // Validate phone
        const phone = document.getElementById('phone').value;
        const phonePattern = /^\d{1,13}$/;
        if (!phonePattern.test(phone)) {
            document.getElementById('phoneError').textContent = 'Phone number must be up to 13 digits and contain only numbers';
            isValid = false;
        }

        // Validate password
        const password = document.getElementById('password').value;
        const passwordPattern = /^(?=.*\d).{6,}$/;
        if (!passwordPattern.test(password)) {
            document.getElementById('passwordError').textContent = 'Password must more than 6 char and contain number';
            isValid = false;
        }

        // Validate confirm password
        const confirmPassword = document.getElementById('confirmPassword').value;
        if (confirmPassword !== password) {
            document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
</script>

<?php 
    if(isset($_POST['signup']))
    {   
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
            echo "<p class='text-danger'>All fields are required.</p>";
        } else if($password != $confirm_password) { 
            echo "<p class='text-danger'>Passwords do not match.</p>";
        } else {
            $hashed_password = md5($password);
            $hashed_uid = md5($uid);

            $sql = "INSERT INTO user (first_name, last_name, email, phone, password, uid) VALUES ('$first_name', '$last_name', '$email', $phone,'$hashed_password', '$hashed_uid')";
            
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if($res==TRUE)
            {
                $user_id = mysqli_insert_id($conn);
                $_SESSION['uid'] = $uid;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['login-user'] = "<div class='notice-text-success'>Login Successful</div>";
                $_SESSION['email-user'] = $email;

                header("location:".SITEURL.'index.php');
                exit();
            }
            else
            {
                $_SESSION['add'] = "<div class='notice-text-success'> Failed to create an account </div>";
                header("location:".SITEURL.'index.php');
                exit();
            }
        }
    }
?>

</body>
</html>
