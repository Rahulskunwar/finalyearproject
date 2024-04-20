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
    <link rel="stylesheet" href="./CSS/customer-list.css">
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
                        <li><a href="./category-list.php" class="submenu-list"><ion-icon name="radio-button-on-sharp"></ion-icon>
                                <h4>Categories</h4>
                            </a></li>
                        <li><a href="./product-list.php" class="submenu-list"><ion-icon name="radio-button-on-sharp"></ion-icon>
                                <h4>Products</h4>
                            </a></li>
                        <li><a href="./brand-list.php" class="submenu-list"><ion-icon name="radio-button-on-sharp"></ion-icon>
                                <h4>Brands</h4>
                            </a></li>
                    </ul>
                </div>
                <a href="./order-list.php">
                    <span class="material-icons-sharp">shopping_cart_checkout</span>
                    <h4>Orders</h4>
                </a>
                <a href="#" class="active">
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
                <a href="">LOG OUT</a>
            </div>

        </aside>


        <section>
            <div class="search-bar">
                <span class="material-icons-sharp">search</span>
                <input type="search" id="searchInput" placeholder="Search">
                <div class="margine"></div>
            </div>
            <!-- <div class="addbutton">
                    <a href="./add-product.html">
                        <button type="submit">Add Product</button>
                    </a>
            </div> -->
            <div class="board">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>customer</td>
                            <td>CUstomer id</td>
                            <td>email</td>
                            <td>date created</td>
                            <td>status</td>
                            <td>orders</td>
                            <td>ACTIONS</td>
                        </tr>
                    </thead>
                    <tbody id="productTable">
                        <?php
                        // Establish a connection to your database
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "login_user";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $database);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // SQL query to fetch data from the registered table
                        $sql = "SELECT * FROM registered";
                        $result = $conn->query($sql);

                        // Display data in table rows
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Determine class based on status
                                $statusClass = ($row["status"] === "verified") ? "active" : "inactive";

                                // Default image path
                                $defaultImage = "./Images/default-avatar-profile-icon-of-social-media-user-vector.jpg";

                                echo "<tr>";
                                echo '<td class="product-name">';
                                echo '<img src="' . ($row["image"] ? $row["image"] : $defaultImage) . '" alt="">';
                                echo '<div class="product-description">';
                                echo '<h5>' . $row["full_name"] . '</h5>';
                                echo '</div></td>';
                                echo '<td class="product-sku"><h5>' . $row["id"] . '</h5></td>';
                                echo '<td class="product-category"><p>' . $row["email"] . '</p></td>';
                                echo '<td class="product-price"><h5>' . $row["Date"] . '</h5></td>';
                                echo '<td class="' . $statusClass . '"><p>' . $row["status"] . '</p></td>';
                                echo '<td class="product-rating"><h5>' . $row["totalorder"] . '</h5></td>';
                                echo '<td class="product-action">';
                                echo '<div class="dropdown">';
                                echo '<button class="dropbtn">Action</button>';
                                echo '<div class="dropdown-content">';
                                echo '<button class="show-modal delete-btn" data-customer-id="' . $row["id"] . '">Delete</button>';
                                echo '</div></div></td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No registered users found.</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <span id="displayInfo" class="page-info"></span>
                    <select id="rowsPerPageSelect">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
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
            <h3>Do you want to remove the customer from the list ?</h3>

            <div class="buttons">
                <button class="close-btn">Cancel</button>
                <button class="Okay-btn">Yes</button>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const overlay = document.querySelector('.overlay');
            const popup = document.querySelector('.popup');
            const closeBtn = document.querySelector('.close-btn');
            const okayBtn = document.querySelector('.Okay-btn');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const customerId = button.getAttribute('data-customer-id');
                    popup.style.display = 'block';

                    // When "Yes" is clicked in the popup
                    okayBtn.addEventListener('click', function() {
                        // Send AJAX request
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'customer-delete.php', true);
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
                        xhr.send(`customer_id=${customerId}`);

                        // Hide the popup
                        popup.style.display = 'none';
                    });
                });
            });

            overlay.addEventListener('click', function() {
                popup.style.display = 'none';
            });

            closeBtn.addEventListener('click', function() {
                popup.style.display = 'none';
            });
        });
    </script>

    <script src="./JS/customer-list.js"></script>
    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>