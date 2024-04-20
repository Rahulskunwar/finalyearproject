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
    <link rel="stylesheet" href="./CSS/admin-list.css">
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
                <a href="#"  class="active">
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
                <input type="search" id="searchInput" placeholder="Search" >
                <div class="margine"></div>
            </div>
            <div class="addbutton">
                    <a href="./add-admin.php">
                        <button type="submit">Add Admin</button>
                    </a>
            </div>
            <div class="board">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Admins</td>
                            <td>admin id</td>
                            <td>email</td>
                            <td>date created</td>
                            <td>status</td>
                            <td>ACTIONS</td>
                        </tr>
                    </thead>
                    <tbody id="productTable" >
                        <tr>
                            <td class="product-name">
                                <img src="./qq/profile-1.jpg" alt="">
                                <div class="product-description">
                                    <h5>Rahul Jung Kunwar</h5>
                                </div>
                            </td>
                            <td class="product-sku">
                                <h5>00518419</h5>
                            </td>
                            <td class="product-category">
                                <p>Kunwarrahul100@gmail.com</p>
                            </td>
                            <td class="product-price">
                                <h5>01-01-2024</h5>
                            </td>
                            <td class="active">
                                <p>Active</p>
                            </td>
                            <td class="product-action"> 
                                <div class="dropdown">
                                    <button class="dropbtn">Action</button>
                                    <div class="dropdown-content">
                                        <a href="#" >Edit</a>
                                        <button class="show-modal delete-btn">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="product-name">
                                <img src="./qq/profile-1.jpg" alt="">
                                <div class="product-description">
                                    <h5>Aashra Pradhan</h5>
                                </div>
                            </td>
                            <td class="product-sku">
                                <h5>00518419</h5>
                            </td>
                            <td class="product-category">
                                <p>Kunwarrahul100@gmail.com</p>
                            </td>
                            <td class="product-price">
                                <h5>01-01-2024</h5>
                            </td>
                            <td class="inactive">
                                <p>Inactive</p>
                            </td>
                            <td class="product-action"> 
                                <div class="dropdown">
                                    <button class="dropbtn">Action</button>
                                    <div class="dropdown-content">
                                        <a href="#" >Edit</a>
                                        <button class="show-modal delete-btn">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
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
              
              deleteButtons.forEach(function (button) {
                  button.addEventListener('click', function () {
                      popup.style.display = 'block';
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
    <!-- ASIDE END-->
   
    <script src="./JS/admin-list.js"></script>
      <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

