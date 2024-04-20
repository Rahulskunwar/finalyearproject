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

// Initialize variables
$category_id = "";
$category_name = "";
$category_description = "";

// Check if brand ID is provided in URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $category_id = $_GET['id'];

    // SQL query to fetch brand details based on ID
    $sql = "SELECT * FROM category WHERE category_id = $category_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $category_name = $row['category_name'];
        $category_description = $row['category_description'];
    } else {
        echo "Category not found.";
    }
} else {
    echo "Category ID not provided.";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsve Admin Panel</title>
    <!-- MATERIAL ICONS CON-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- GOOGLE FONT (POPPLNS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- STYLESHEET-->
    <link rel="stylesheet" href="./CSS/add-category.css">
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
                <div class="dropdown">
                    <a href="#" class="dropdown-btn active">
                        <span class="material-icons-sharp">inventory_2</span>
                        <h4>Catalog</h4>
                        <span class="material-icons-sharp arrow">chevron_right</span>
                    </a>
                    <ul class="dropdown-content">
                        <li><a href="./category-list.php" class="submenu-category"><ion-icon name="radio-button-on-sharp"></ion-icon>
                                <h4>Categories</h4>
                            </a></li>
                        <li><a href="./product-list.php" class="submenu-product"><ion-icon name="radio-button-on-sharp"></ion-icon>
                                <h4>Products</h4>
                            </a></li>
                        <li><a href="./brand-list.php" class="submenu-add"><ion-icon name="radio-button-on-sharp"></ion-icon>
                                <h4>Brands</h4>
                            </a></li>
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
                    <h2>ADD CATEGORY</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="category_name">CATEGORY NAME:</label>
                            <input type="text" id="category_name" name="category_name"  value="<?php echo $category_name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="category_discription">Description:</label>
                            <textarea name="category_description" id="category_description" cols="30" rows="10" required><?php echo $category_description; ?></textarea>
                            <!-- <input type="text" id="bio" name="bio" required> -->
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
        <button type="submit" name="submit">Save Change</button>
        </form>

    </main>
    <!-- ASIDE END-->

    <script src="./JS/add-category.js"></script>
    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>