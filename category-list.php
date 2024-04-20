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
    <link rel="stylesheet" href="./CSS/category-list.css">
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
                    <a href="./dashboard.php" >
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

        <section>
            <div class="search-bar">
                <span class="material-icons-sharp">search</span>  
                <input type="search" id="searchInput" placeholder="Search" >
                <div class="margine"></div>
            </div>
            <div class="addbutton">
                    <a href="./add-category.php">
                        <button type="submit">Add Category</button>
                    </a>
            </div>
            <div class="board">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Categories</td>
                            <td>Total Products</td>
                            <td>Total earning (Rs.)</td>
                            <td>ACTIONS</td>
                        </tr>
                    </thead>
                    <tbody id="categoryTable" >
                    <?php
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

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_brand'])) {
                            // Check if brand ID is provided
                            if (isset($_POST['brand_id']) && !empty($_POST['brand_id'])) {
                                $brand_id = $_POST['brand_id'];
                                
                                // SQL query to delete the brand
                                $sql = "DELETE FROM brand WHERE brand_id = $brand_id";
                                
                                if ($conn->query($sql) === TRUE) {
                                    echo "Brand deleted successfully";
                                } else {
                                    echo "Error deleting brand: " . $conn->error;
                                }
                            }
                        }

                        $sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Loop through each row in the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Output the HTML for each category
        echo '<tr>';
        echo '<td class="product-name">';
        echo '<img src="'.$row['img'].'" alt="">';
        echo '<div class="product-description">';
        echo '<h5>'.$row['category_name'].'</h5>'; // Assuming name column in 'category' table
        echo '<p>'.$row['category_description'].'</p>'; // Assuming description column in 'category' table
        echo '</div>';
        echo '</td>';
        echo '<td class="product-sku">';
        echo '<h5>'.$row['total_product'].'</h5>'; // Assuming sku column in 'category' table
        echo '</td>';
        echo '<td class="product-category">';
        echo '<h5>'.$row['totap_earning'].'</h5>';
        echo '</td>';
        echo '<td class="product-action">';
        echo '<div class="dropdown">';
        echo '<button class="dropbtn">Action</button>';
        echo '<div class="dropdown-content">';
        echo "<a href='update-category.php?id=" . $row['category_id'] . "'>Edit</a>";
        echo '<button class="show-modal delete-btn" data-category-id="' . $row["category_id"] . '">Delete</button>';
        echo '</div>';
        echo '</div>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    // No categories found
    echo "No categories found.";
}

// Close the database connection
mysqli_close($conn);

?>
                        
                    </tbody>
                </table>
                <div class="pagination">
                    <span id="displayInfo" class="page-info"></span>
                    <select id="rowsPerPageSelect">
                        <option value="7">7</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="all">Show All</option>
                    </select>
                    <button id="prevBtn" class="btn-arrow">Previous</button>
                    <span id="currentPage" class="current-page"></span>
                    <button id="nextBtn" class="btn-arrow">Next</button>
                </div>
                
            </div>



        </section>
        

        <!-- MIDDLE END-->


    </main>
    <!-- ASIDE END-->

    <section class="popup">
        <span class="overlay"></span>
    
        <div class="modal-box">
            <span class="material-icons-sharp">delete_forever</span>
          <h2>Delete !</h2>
          <h3>Do you want to remove the item from the list ?</h3>
    
          <div class="buttons">
            <button class="close-btn">Cancel</button>
            <button class="Okay-btn">Yes</button>
          </div>
        </div>
      </section>
      
      <script>
          document.addEventListener('DOMContentLoaded', function () {
              const deleteButtons = document.querySelectorAll('.delete-btn');
              const overlay = document.querySelector('.overlay');
              const popup = document.querySelector('.popup');
              const closeBtn = document.querySelector('.close-btn');
            const okayBtn = document.querySelector('.Okay-btn');
              
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const categoryId = button.getAttribute('data-category-id');
                    popup.style.display = 'block';

                    // When "Yes" is clicked in the popup
                    okayBtn.addEventListener('click', function() {
                        // Send AJAX request
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'delete-category.php', true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                const response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    // Remove the row from the table
                                    const row = button.closest('tr');
                                    row.parentNode.removeChild(row);
                                } else {
                                    console.error('Delete request failed:', response.error);
                                }
                            } else {
                                console.error('Delete request failed:', xhr.statusText);
                            }
                        };
                        xhr.onerror = function() {
                            console.error('Delete request failed:', xhr.statusText);
                        };
                        xhr.send(`category_id=${categoryId}`);

                        // Hide the popup
                        popup.style.display = 'none';
                    });
                });
            });
                
                overlay.addEventListener('click', function () {
                    popup.style.display = 'none';
                });
                
                closeBtn.addEventListener('click', function () {
                    popup.style.display = 'none';
                });
            });
            </script>
   
    <script src="./JS/category-list.js"></script>
      <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>


