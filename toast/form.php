<?php

include_once("config.php");


error_reporting(E_ALL);

// Encryption and Decryption functions

// Encrypt the password for storage
function encryptPassword($password, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($password, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $encrypted);
}

// Decrypt the stored password
function decryptPassword($encrypted_password, $key) {
    $data = base64_decode($encrypted_password);
    $iv_size = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($data, 0, $iv_size);
    $encrypted = substr($data, $iv_size);
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
}

// Your encryption key (must be kept secure)
$key = "your_secret_key";

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "login_user";

$msg = '';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if(isset($_POST['login'])) {
    $email = $_POST['email']; 
    $password = $_POST['password'];

    // Filter and sanitize the email
    $email = strip_tags(mysqli_real_escape_string($conn, trim($email)));

    // Query the database to retrieve the stored password hash and email verification status
    $query = "SELECT * FROM registered WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password_hash = $row['password'];
        $email_verified = $row['status'];

        if ($email_verified == 'verified') {
            // Email verified, proceed with password verification
            if(password_verify($password, $stored_password_hash)) {
                // Password matched, redirect the user to landing page
                header("Location: http://localhost//landingpage/logedinlanding.php");
                exit();
            } else {
                // Incorrect password
                $msg = 'Incorrect Password - Login Failed';
                echo "<script>alert('$msg');</script>";
            }
        } elseif ($email_verified == 'unverified') {
            if (password_verify($password, $stored_password_hash)) {
                // Email not verified, redirect to verification page
            header("Location: http://localhost//landingpage/sendotp.php?email=$email");
            exit();
        } else {
            // Incorrect password
            $msg = 'Incorrect Password - Login Failed';
            echo "<script>alert('$msg');</script>";
        }
    } else {
        // Email not found in the database
        $msg = 'Account not found.';
        echo "<script>alert('$msg');</script>";
    }
}
}



// Handle signup form submission
if(isset($_POST['signup'])) {
    $fullname = $_POST['fullname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    // Check if the email already exists in the database
    $query_check_email = "SELECT * FROM registered WHERE email=?";
    $stmt_check_email = $conn->prepare($query_check_email);
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $result_check_email = $stmt_check_email->get_result();

    if($result_check_email->num_rows > 0) {
        // Email already exists
        $msg = 'An account with this email already exists.';
    } else {
        // Email does not exist, proceed with signup
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Perform SQL query to insert the new user into the database
        $stmt_insert_user = $conn->prepare("INSERT INTO registered (full_name, username, number, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt_insert_user->bind_param("sssss", $fullname, $name, $number, $email, $hashed_password);

        if($stmt_insert_user->execute()) {
            // Signup successful, redirect to success page or do further processing

            header("Location: form.php");
            exit();
        } else {
            echo "Error: " . $stmt_insert_user->error;
        }

        $stmt_insert_user->close();
    }

    $stmt_check_email->close();
}


?>














































<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 
    - primary meta tags
-->
    <title>Kunwar Fashion - LogIn SignUp</title>
    <meta name="title" content="Kunwar Fashion - Fashion Of All Brands">
    <meta name="description">

    <!-- 
    - favicon
-->
    <link rel="shortcut icon" href="../container/icnos/Only logo.png" type="image">

    <!-- 
    - google font link
-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <!-- 
    - custom css link
-->
    <link rel="stylesheet" href="./assets/CSS/style.css">
    <link rel="stylesheet" href="./assets/CSS/fv.css">

</head>

<body class="has-bg-image" style="background-image: url(./background.png);">

    <!-- 
    - #PRELOADER
-->

    <div class="preload" data-preaload>
        <div class="circle"></div>
        <p class="text-load">KUNWAR FASHION</p>
    </div>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="post" >
                <h1>Create Account</h1>
                <img src="../container/icnos/Only logo.png" width="100" height="100">
                <div class="social-container">
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon></a>
                </div>
                <!-- <span>Please fill out all the boxes</span> -->
                <!-- <div class="input_box">
                        <input type="text" placeholder="Full Name" required>
                        <i class="uil uil-envelope-alt email"></i>
                    </div> -->
                <div class="input_box field">
                    <label>
                        <input data-validate-length-range="6" data-validate-words="2" name="fullname"
                            placeholder="Enter full name" required="required" />
                        <i class="uil uil-user username"></i>
                    </label>
                    <div class='tooltip help'>
                        <span>?</span>
                        <div class='content'>
                            <b></b>
                            <p>Field must include your name with surname</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="input_box">
                        <input type="text" placeholder="Username" required>
                        <i class="uil uil-user username"></i>
                    </div> -->
                <div class="input_box field">
                    <label>
                        <input data-validate-length-range="3" name="name" placeholder="Enter username"
                            required="required" />
                        <i class="uil uil-user username"></i>
                    </label>
                    <div class='tooltip help'>
                        <span>?</span>
                        <div class='content'>
                            <b></b>
                            <p>Name must include atleast 3 words</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="input_box">
                        <input type="email" placeholder="E-mail address" required>
                        <i class="uil uil-envelope-alt email"></i>
                    </div> -->
                <div class="input_box field">
                    <label>
                        <input id="email" name="email" placeholder="Enter Email" class='email' required="required" type="email" />
                        <i class="uil uil-envelope-alt email"></i>
                    </label>
                    <div class='tooltip help'>
                        <span>?</span>
                        <div class='content'>
                            <b></b>
                            <p>The email should consist of " @ " and " . " in a valid way.</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="input_box">
                        <input type="text" placeholder="Phone Number" required>
                        <i class="uil uil-phone-alt number"></i>
                    </div> -->
                <div class="input_box field">
                    <label>
                        <input type="tel" class='tel' placeholder="Enter contact number" name="number"
                            required='required' data-validate-length-range="8,20">
                        <i class="uil uil-phone-alt number"></i>
                    </label>
                    <div class='tooltip help'>
                        <span>?</span>
                        <div class='content'>
                            <b></b>
                            <p>Notice that the number should consist of 10 nubmbers</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="input_box">
                        <input type="password" placeholder="Create password" required>
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div> -->
                <div class="input_box field">
                    <label>
                        <input type="password" placeholder="Enter Password" name="password" data-validate-length="6,8"
                            required='required'>
                        <!-- <i class="uil uil-lock password"></i> -->
                        <i class="uil uil-eye-slash pw_hide password"></i>
                    </label>
                    <div class='tooltip help'>
                        <span>?</span>
                        <div class='content'>
                            <b></b>
                            <p>Should be of length 6 or 8 characters</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="input_box">
                        <input type="password" placeholder="Confirm password" required>
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div> -->
                <div class="input_box field">
                    <label>
                        <input type="password" placeholder="Confirm Password" name="conpassword"
                            data-validate-linked='password' required='required'>
                        <!-- <i class="uil uil-lock password"></i> -->
                        <i class="uil uil-eye-slash pw_hide password"></i>
                    </label>
                    <div class='tooltip help'>
                        <span>?</span>
                        <div class='content'>
                            <b></b>
                            <p>Should matched with earlier inputed password</p>
                        </div>
                    </div>
                </div>

                <div class="margin"> </div>
                <button type="submit" name="signup" class="btn btn-secondary">
                    <span class="text text-1">Sign Up</span>

                    <span class="text text-2" aria-hidden="true">Sign Up</span>
                </button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method = "post">
                <h1>Sign In</h1>
                <div class="mini-margin"> </div>
                <img src="../container/icnos/Only logo.png" width="100" height="100">
                <div class="mini-margin"> </div>
                <div class="social-container">
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon></a>
                </div>
                <span>Enter your email and password here</span>
                <div class="mini-margin"> </div>
                <div class="input_box">
                    <input name="email" placeholder="Enter E-mail Address" class='email' required="required"
                        type="email" />
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="password" placeholder="Password" class="password" name="password" required="required">
                    <i class="uil uil-lock password"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                </div>
                    <div class="forgot_field"> 
                    <a href="#" class="forget_pw">Forgot Password?</a>
                </div>
                <div class="margin"> </div>
                <button type="submit" name="login" class="btn btn-secondary">
                    <span class="text text-1">Sign In</span>

                    <span class="text text-2" aria-hidden="true">Sign In</span>
                </button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <!-- <button class="ghost" id="signIn">Sign In</button> -->
                    <button type="submit" class="btn btn-secondary ghost" id="signIn">
                        <span class="text text-1">Sign In</span>

                        <span class="text text-2" aria-hidden="true">Sign In</span>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friends!</h1>
                    <p>Enter your personal details and start the journey with us</p>

                    <!-- <button class="ghost" id="signUp">Sign Up</button> -->
                    <button type="submit" class="btn btn-secondary ghost" id="signUp">
                        <span class="text text-1">Sign Up</span>

                        <span class="text text-2" aria-hidden="true">Sign Up</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="close">
            <a href="../landing.php">
                <ion-icon name="close-circle-outline" size="large"></ion-icon>
            </a>

        </div>
    </div>

</body>

</html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="./assets/Scripts/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- <script src="multifield.js"></script> -->
<script src="./assets/Scripts/validator.js"></script>
<script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({ "events": ['blur', 'paste', 'change'] }, document.forms[0]);

    validator.texts.mySpecialInput = "wrong input" // custom error message for pattern mismatch

    // on form "submit" event
    document.forms[0].onsubmit = function (e) {
        var submit = true,
            validatorResult = validator.checkAll(this);

        console.log(validatorResult);
        return !!validatorResult.valid;
    }

    // on form "reset" event
    document.forms[0].onreset = function (e) {
        validator.reset();
    }

    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function () {
        validator.settings.alerts = !this.checked;

        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);
</script>