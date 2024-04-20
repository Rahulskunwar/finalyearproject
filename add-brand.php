<?php
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Information from the form section
    $brandName = $_POST["fullname"];
    $description = $_POST["bio"];
    $countryOfOrigin = $_POST["countryorigiin"];
    $industry = $_POST["industry"];

    // File upload handling for the image section
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["customFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["customFile"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $msg = 'File is not an image';
            echo "<script>alert('$msg');</script>";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $msg = 'Sorry, file already exists.';
        echo "<script>alert('$msg');</script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["customFile"]["size"] > 500000) {
        $msg = 'Sorry, your file is too large.';
        echo "<script>alert('$msg');</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        $msg = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        echo "<script>alert('$msg');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $msg = 'Sorry, your file was not uploaded.';
        echo "<script>alert('$msg');</script>";
    } else {
        // Check if the target directory exists, create it if not
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // Create the directory
        }

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $targetFile)) {
            // Insert data into database
            $sql = "INSERT INTO brand (brand_name, brand_description, country_of_origin, industry, img)
            VALUES ('$brandName', '$description', '$countryOfOrigin', '$industry', '$targetFile')";

            if ($conn->query($sql) === TRUE) {
                $msg = 'New record created successfully';
                echo "<script>alert('$msg');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $msg = 'Sorry, there was an error uploading your file.';
            echo "<script>alert('$msg');</script>";
        }
    }
}



$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsve Admin Panel</title>
    <!-- MATERIAL ICONS CON-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
      <!-- GOOGLE FONT (POPPLNS) -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- STYLESHEET-->
    <link rel="stylesheet" href="./CSS/add-brand.css">
</head>
<body>
    <nav>
        <div class="container">
            <img src="./Images/logo/Kunwar Fashion-Text.png" class="logo">
            <div class="profile-area">
                <div class="theme-btn">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="profile-photo">
                        <img src="./Images/profile-img.png">
                    </div>
                    <h5> Rahul Jung Kunwar</h5>
                    <span class="material-icons-sharp">expand_more</span>
                </div>
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
            </div>
        </div>
    </nav>
    <!-- NAVIGATION END-->
    
    <main>
        <aside>
            <button id="close-btn">
                <span class="material-icons-sharp">cancel</span>
            </button>
            <div class="sidebar">
                <!-- <div class="sidebar"> -->
                    <a href="./dashboard.php">
                        <span class="material-icons-sharp">dashboard</span>
                        <h4>Dashboard</h4>
                    </a>
                    <div class="dropdown" >
                        <a href="#" class="dropdown-btn active">
                            <span class="material-icons-sharp">inventory_2</span>
                            <h4 >Catalog</h4>
                            <span class="material-icons-sharp arrow">chevron_right</span>
                        </a>
                        <ul class="dropdown-content">
                            <li><a href="./category-list.php" class="submenu-category"><ion-icon name="radio-button-on-sharp"></ion-icon><h4>Categories</h4></a></li>
                            <li><a href="./product-list.php" class="submenu-product"><ion-icon name="radio-button-on-sharp"></ion-icon><h4>Products</h4></a></li>
                            <li><a href="./brand-list.php" class="submenu-add"><ion-icon name="radio-button-on-sharp"></ion-icon><h4>Brands</h4></a></li>
                        </ul>
                </div>
                <a href="./order-list.php">
                    <span class="material-icons-sharp">shopping_cart_checkout</span>
                    <h4>Orders</h4>
                </a>
                <a href="./customer-list.php">
                    <span class="material-icons-sharp">group</span>
                    <h4>Customers</h4>
                </a>
                <a href="./transaction-list.php">
                    <span class="material-icons-sharp">receipt_long</span>
                    <h4>Transactions</h4>
                </a>
                <!-- <a href="#">
                    <span class="material-icons-sharp">chat</span>
                    <h4>Messages</h4>
                </a> -->
                <a href="./admin-list.php">
                    <span class="material-icons-sharp">person</span>
                    <h4>Admins</h4>
                </a>
            </div>
            <!-- SIDEBAR END-->

            <div class="updates">
                <a href="#">LOG OUT</a>
            </div>

        </aside>
        
        <section class="add-product-section" id="info-section">
    <div class="board">
        <div class="form-container">
            <h2>ADD Brand</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fullname">Brand Name:</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="bio">Description:</label>
                    <textarea name="bio" id="bio" cols="30" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="countryorigiin">Country Of Origin:</label>
                    <input type="text" id="countryorigiin" name="countryorigiin" required>
                </div>
                <div class="form-group">
                    <label for="industry">Industry:</label>
                    <input type="text" id="industry" name="industry" required>
                </div>
            </div>
        </div>
    </section>
    
    <section class="add-product-section-right" id="image-section">
        <h3>Brand Picture</h3>
        <div class="secproimg">
            <h5>Upload Image</h5>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <div class="field">
                <div id="customLargePreview" class="large-preview"></div>
                <label for="customFile" class="upload-icon">
                    <span class="material-icons-sharp">drive_folder_upload</span>
                </label>
                <input type="file" id="customFile" name="customFile" class="upload-img" style="display: none;" accept="image/*" required />
                <div class="margin-bottom"></div>
            </div>
    </div>
</section>

<button type="submit" name="submit">Submit</button>
</form>

        
    </main>
    <!-- ASIDE END-->

    <script src="./JS/add-brand.js"></script>
      <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
