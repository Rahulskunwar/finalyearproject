<?php
// Database connection
$servername = "localhost";
$username = "root"; // Assuming username is root
$password = ""; // Assuming password is blank
$dbname = "login_user"; // Assuming database name is login_user

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $productName = $conn->real_escape_string($_POST['productName']);
    $productDescription = $conn->real_escape_string($_POST['productDescription']);
    $productPrice = $conn->real_escape_string($_POST['productPrice']);
    $productBrand = $conn->real_escape_string($_POST['productBrand']);
    $productCategory = $conn->real_escape_string($_POST['productCategory']);
    $productQuantity = $conn->real_escape_string($_POST['productQuantity']);
    $productSKU = $conn->real_escape_string($_POST['productSKU']);

    // Handle checkboxes for product sizes and colors
    if (isset($_POST['productSizes']) && is_array($_POST['productSizes'])) {
        $escapedSizes = array_map(array($conn, 'real_escape_string'), $_POST['productSizes']);
        $productSizes = implode(',', $escapedColors);
    } else {
        $productSizes = '';
    }

    if (isset($_POST['productColors']) && is_array($_POST['productColors'])) {
        // Escape each color and then implode
        $escapedColors = array_map(array($conn, 'real_escape_string'), $_POST['productColors']);
        $productColors = implode(',', $escapedColors);
    } else {
        $productColors = '';
    }

    // File upload handling for primary image
    $targetDir = "uploads/";
    $fileName = basename($_FILES["customFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');

    if (!empty($fileName)) {
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $targetFilePath)) {
                // Insert product data into database
                $sql = "INSERT INTO product (product_name, product_description, product_price, product_brand, product_gender, product_category, product_quantity, product_sku, product_size, product_color, thumbnail_img)
                VALUES ('$productName', '$productDescription', '$productPrice', '$productBrand', '', '$productCategory', '$productQuantity', '$productSKU', '$productSizes', '$productColors', '$targetFilePath')";

                if ($conn->query($sql) === TRUE) {
                    $msg = 'Product added successfully.';
                    echo "<script>alert('$msg');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $msg = 'Sorry, there was an error uploading your file.';
                echo "<script>alert('$msg');</script>";
            }
        } else {
            $msg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed.';
            echo "<script>alert('$msg');</script>";
        }
    } else {
        $msg = 'Please select a file.';
        echo "<script>alert('$msg');</script>";
    }

    // Handle additional images (other_img)
    if (!empty($_FILES['files']['name'][0])) {
        $filesCount = count($_FILES['files']['name']);
        $uploadedFiles = array();
        for ($i = 0; $i < $filesCount; $i++) {
            $fileName = basename($_FILES['files']['name'][$i]);
            $targetFilePath = $targetDir . $fileName;
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $targetFilePath)) {
                $uploadedFiles[] = $targetFilePath;
                // Insert additional images into database
                $updateSql = "UPDATE product SET other_img = '$targetFilePath' WHERE product_sku = '$productSKU'";
                if ($conn->query($updateSql) === FALSE) {
                    echo "Error updating record: " . $conn->error;
                } else {
                    $msg = 'Additional images added successfully.';
                    echo "<script>alert('$msg');</script>";
                }
            }
        }
    } else {
        $msg = 'No additional images found.';
        echo "<script>alert('$msg');</script>";
    }

    // Close connection
    $conn->close();
} else {
    // $msg = 'Form not submitted.';
    // echo "<script>alert('$msg');</script>";
}
?>



<!-- ==================================================================================================================================================== -->


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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
    <!-- STYLESHEET-->
    <link rel="stylesheet" href="./CSS/add-product.css">
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

    <section class="add-product-section-top">
        <form action="" id="addProductForm">
        </form>
    </section>

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
                        <li><a href="./category-list.php" class="submenu-list"><ion-icon name="radio-button-on-sharp"></ion-icon>
                                <h4>Categories</h4>
                            </a></li>
                        <li><a href="./product-list.php" class="submenu-product"><ion-icon name="radio-button-on-sharp"></ion-icon>
                                <h4>Products</h4>
                            </a></li>
                        <li><a href="./brand-list.php" class="submenu-add"><ion-icon name="radio-button-on-sharp"></ion-icon>
                                <h4>Brands</h4>
                            </a></li>
                    </ul>
                    <!-- </div> -->
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





        <section class="add-product-section">
            <form id="addProductForm" method="post" enctype="multipart/form-data">
                <h2>Add Product</h2>
                <div class="form-group">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="productName" required>
                </div>
                <div class="form-group">
                    <label for="productDescription">Description:</label>
                    <textarea id="productDescription" name="productDescription" required></textarea>
                </div>
                <div class="form-group">
                    <label for="productPrice">Price:</label>
                    <input type="number" id="productPrice" name="productPrice" min="0" required>
                </div>
                <div class="form-group">
                    <label for="productBrand">Brand:</label>
                    <select id="productBrand" name="productBrand" required>
                        <option value="">Select Brand</option>
                        <?php
                        // Database connection
                        $servername = "localhost";
                        $username = "root"; // Your username
                        $password = ""; // Your password
                        $dbname = "login_user"; // Your database name

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch brand options from database
                        $sql = "SELECT brand_name FROM brand"; // Assuming your table name for brands is 'brands'
                        $result = $conn->query($sql);

                        // Check if there are results
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["brand_name"] . '">' . $row["brand_name"] . '</option>';
                            }
                        } else {
                            echo '<option value="">No Brands Found</option>';
                        }

                        // Close connection
                        $conn->close();
                        ?>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label>Gender:</label>
                    <div class="gender-options">
                        <input type="checkbox" id="onlymale" name="productSizes" value="Male">
                        <label for="onlymale">Male</label>

                        <input type="checkbox" id="onlyfemale" name="productSizes" value="Female">
                        <label for="onlyfemale">Female</label>

                        <input type="checkbox" id="all" name="productSizes" value="Unisex">
                        <label for="all">Unisex</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productCategory">Category:</label>
                    <select id="productCategory" name="productCategory" required>
                        <option value="" disabled selected hidden>Select Category</option>
                        <?php
                        // Database connection
                        $servername = "localhost";
                        $username = "root"; // Your username
                        $password = ""; // Your password
                        $dbname = "login_user"; // Your database name

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch brand options from database
                        $sql = "SELECT category_name FROM category"; // Assuming your table name for brands is 'brands'
                        $result = $conn->query($sql);

                        // Check if there are results
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["category_name"] . '">' . $row["category_name"] . '</option>';
                            }
                        } else {
                            echo '<option value="">No Categories Found</option>';
                        }

                        // Close connection
                        $conn->close();
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label id="size-label">Size:</label>
                    <div class="cusize-options">
                        <input type="checkbox" id="small" name="productSizes" value="small">
                        <label for="small">Small</label>

                        <input type="checkbox" id="medium" name="productSizes" value="medium">
                        <label for="medium">Medium</label>

                        <input type="checkbox" id="large" name="productSizes" value="large">
                        <label for="large">Large</label>
                    </div>

                    <div class="size-options">
                        <input type="checkbox" id="XS" name="productSizes" value="XS">
                        <label for="XS">XS</label>

                        <input type="checkbox" id="S" name="productSizes" value="S">
                        <label for="S">S</label>

                        <input type="checkbox" id="M" name="productSizes" value="M">
                        <label for="M">M</label>

                        <input type="checkbox" id="L" name="productSizes" value="L">
                        <label for="L">L</label>

                        <input type="checkbox" id="XL" name="productSizes" value="XL">
                        <label for="XL">XL</label>

                        <input type="checkbox" id="XXL" name="productSizes" value="XXL">
                        <label for="XXL">XXL</label>
                    </div>

                    <div class="shoesize-options">
                        <input type="checkbox" id="37" name="productSizes" value="37">
                        <label for="37">37</label>

                        <input type="checkbox" id="38" name="productSizes" value="38">
                        <label for="38">38</label>

                        <input type="checkbox" id="39" name="productSizes" value="39">
                        <label for="39">39</label>

                        <input type="checkbox" id="40" name="productSizes" value="40">
                        <label for="40">40</label>

                        <input type="checkbox" id="41" name="productSizes" value="41">
                        <label for="41">41</label>

                        <input type="checkbox" id="42" name="productSizes" value="42">
                        <label for="42">42</label>

                        <input type="checkbox" id="43" name="productSizes" value="43">
                        <label for="43">43</label>

                        <input type="checkbox" id="44" name="productSizes" value="44">
                        <label for="44">44</label>

                        <input type="checkbox" id="45" name="productSizes" value="45">
                        <label for="45">45</label>

                        <input type="checkbox" id="46" name="productSizes" value="46">
                        <label for="46">46</label>

                        <input type="checkbox" id="47" name="productSizes" value="47">
                        <label for="47">47</label>
                    </div>
                </div>


                <div class="form-group">
                    <label id="color-label">Color:</label>
                    <div class="color-options">
                        <input type="checkbox" id="red" name="productColors" value="red">
                        <label for="red">Red</label>

                        <input type="checkbox" id="green" name="productColors" value="green">
                        <label for="green">Green</label>

                        <input type="checkbox" id="blue" name="productColors" value="blue">
                        <label for="blue">Blue</label>

                        <input type="checkbox" id="yellow" name="productColors" value="yellow">
                        <label for="yellow">Yellow</label>

                        <input type="checkbox" id="orange" name="productColors" value="orange">
                        <label for="orange">Orange</label>

                        <input type="checkbox" id="purple" name="productColors" value="purple">
                        <label for="purple">Purple</label>

                        <input type="checkbox" id="pink" name="productColors" value="pink">
                        <label for="pink">Pink</label>

                        <input type="checkbox" id="brown" name="productColors" value="brown">
                        <label for="brown">Brown</label>

                        <input type="checkbox" id="gray" name="productColors" value="gray">
                        <label for="gray">Gray</label>

                        <input type="checkbox" id="black" name="productColors" value="black">
                        <label for="black">Black</label>

                        <input type="checkbox" id="white" name="productColors" value="white">
                        <label for="white">White</label>

                        <input type="checkbox" id="teal" name="productColors" value="teal">
                        <label for="teal">Teal</label>

                    </div>
                </div>

                <div class="form-group">
                    <label for="productQuantity">Quantity:</label>
                    <input type="number" id="productQuantity" name="productQuantity" min="1" required>
                </div>
                <div class="form-group">
                    <label for="productSKU">SKU:</label>
                    <input type="text" id="productSKU" name="productSKU" required>
                </div>


                <!-- ========================================================================================================== -->


        </section>


        <section class="add-product-section-right">

            <div class="margine"></div>

            <h3>PRODUCT MEDIA</h3>

            <div class="secproimg">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <div class="field">
                    <h3>Primary Image</h3>
                    <div id="customLargePreview" class="large-preview"></div>
                    <label for="customFile" class="upload-icon">
                        <span class="material-icons-sharp">drive_folder_upload</span>
                    </label>
                    <h5>Upload Image</h5>
                    <input type="file" id="customFile" name="customFile" class="upload-img" accept="image/*" required>
                </div>
            </div>


            <div class="addproimg">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <div class="field">
                    <h3>Secondary Images</h3>
                    <div id="largePreview" class="large-preview"></div>
                    <label for="files" class="upload-icon">
                        <span class="material-icons-sharp">drive_folder_upload</span>
                    </label>
                    <h5>Upload Image</h5>
                    <h6>All Images</h6>
                    <input type="file" id="files" name="files[]" class="upload-img" multiple accept="image/*" accept="image/*" required />
                </div>
            </div>





        </section>

        <button type="submit">Add Product</button>
        </form>




        <!-- RIGHT END-->
    </main>
    <!-- ASIDE END-->

    <script src="./JS/add-product.js"></script>
    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>