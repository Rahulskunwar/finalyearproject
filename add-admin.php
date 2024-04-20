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
    <link rel="stylesheet" href="./CSS/add-admin.css">
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
                        <a href="#" class="dropdown-btn">
                            <span class="material-icons-sharp">inventory_2</span>
                            <h4>Catalog</h4>
                            <span class="material-icons-sharp arrow">chevron_right</span>
                        </a>
                        <ul class="dropdown-content">
                            <li><a href="./category-list.php" class="submenu-list"><ion-icon name="radio-button-on-sharp"></ion-icon><h4>Categories</h4></a></li>
                            <li><a href="./product-list.php" class="submenu-list"><ion-icon name="radio-button-on-sharp"></ion-icon><h4>Products</h4></a></li>
                            <li><a href="./brand-list.php" class="submenu-list"><ion-icon name="radio-button-on-sharp"></ion-icon><h4>Brands</h4></a></li>
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
                <a href="./admin-list.php" class="active">
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
            <div class="board">
                <div class="form-container">
                    <h2>Admin Account Creation Form</h2>
                    <form action="#" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" id="fullname" name="fullname" required>
                      </div>
                      <div class="form-group">
                          <label for="username">Username:</label>
                          <input type="text" id="username" name="username" required>
                      </div>
                      <div class="form-group">
                          <label for="phone">Phone Number:</label>
                          <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                      <div class="form-group">
                          <label for="dob">Date Of Birth:</label>
                          <input type="text" id="dob" name="dob" required>
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio:</label>
                            <textarea name="bio" id="bio" cols="30" rows="10" required></textarea>
                            <!-- <input type="text" id="bio" name="bio" required> -->
                        </div>
                        <div class="form-group">
                          <label for="email">Email Address:</label>
                          <input type="email" id="email" name="email" required>
                        </div>
                      <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                      </div>
                      <button type="submit">Submit</button>
                    </form>
                  </div>
                </div>

        </section>

        <section class="add-product-section-right">

            <h3>Profile Picture</h3>

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
        
    </main>
    <!-- ASIDE END-->

    <script src="./JS/add-admin.js"></script>
      <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>