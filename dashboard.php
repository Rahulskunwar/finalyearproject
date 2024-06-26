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
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <img src="./Images/logo/Kunwar Fashion-Text.png" class="logo">
            <div class="search-bar">
                <span class="material-icons-sharp">search</span>  
                <input type="search" placeholder="Search">
            </div>
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
                    <a href="#" class="active">
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
                            <li><a href="./product-list.php" class="submenu-list"><ion-icon name="radio-button-on-sharp"></ion-icon><h4>Products </h4></a></li>
                            <li><a href="./brand-list.php" class="submenu-list"><ion-icon name="radio-button-on-sharp"></ion-icon><h4> Brands</h4></a></li>
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
        
        <section class="middle">
            <div class="header">
                <h1>OVERVIEW</h1>
                <!-- <input type="date" name="" id=""> -->
            </div>
            <div class="cards">
                <div class="card">
                    <div class="top">
                        <h2>USERS</h2>
                        <div class="user-icons">
                            <!-- Insert user icons dynamically here -->
                            <span class="material-icons-sharp">
                                groups
                                </span>
                            <!-- Add more user icons as needed -->
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="total-users">
                            <h3>500</h3> <!-- Total number of users -->
                            <small>TOTAL USERS</small>
                        </div>
                    </div>                                                      
                </div>
                <!-- CARD END - 1 -->

                <div class="card">
                    <div class="top">
                        <h2>PRODUCTS</h2>
                        <div class="user-icons">
                            <!-- Insert user icons dynamically here -->
                            <span class="material-icons-sharp">
                                inventory_2
                                </span>
                            <!-- Add more user icons as needed -->
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="total-users">
                            <h3>500</h3> <!-- Total number of users -->
                            <small>TOTAL PRODUCTS</small>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="top">
                        <h2>ORDERS</h2>
                        <div class="user-icons">
                            <span class="material-icons-sharp">
                                inventory
                                </span>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="total-users">
                            <h3>2</h3>
                            <small>TOTAL ORDERS</small>
                        </div>
                    </div>
                </div>
                
                <!-- CARD END - 2-->

                <!-- <div class="card">
                    <div class="top">
                        <div class="left">
                            <img src="./qq/Shoes.jpg">
                            <h2>SHOES</h2>
                        </div>
                        <img src="./qq/Shoes.jpg" class="right">
                    </div>
                    <div class="middle">
                        <h1>Rs. 0</h1>
                        <div class="chip">
                            <img src="./qq/card chip.png">
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Card Holder</small>
                            <h5>Rahul Jung Kunwar</h5>
                        </div>
                        <div class="right">
                            <div class="expiry">
                                <small>Expiry</small>
                                <h5>08/23</h5>
                            </div>
                            <div class="cvv">
                                <small>CVV</small>
                                <h5>123</h5>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- CARD END - 3-->

            </div>
            
            <!-- CARDS END -->

            <!-- <div class="monthly-report">
                <div class="report">
                    <h3>Income</h3>
                    <div>
                        <details>
                            <h1>Rs. 0</h1>
                            <h6 class="success">+ 0%</h6>
                        </details>
                        <p class="text-muted">Compared to Rs. 0 last month</p>
                    </div>
                </div>

                <div class="report">
                    <h3>Expenses</h3>
                    <div>
                        <details>
                            <h1>Rs. 0</h1>
                            <h6 class="success">+ 0%</h6>
                        </details>
                        <p class="text-muted">Compared to Rs. 0 last month</p>
                    </div>
                </div>

                <div class="report">
                    <h3>CashBack</h3>
                    <div>
                        <details>
                            <h1>Rs. 0</h1>
                            <h6 class="success">+ 0%</h6>
                        </details>
                        <p class="text-muted">Compared to Rs. 0 last month</p>
                    </div>
                </div>

                <div class="report">
                    <h3>TurnOver</h3>
                    <div>
                        <details>
                            <h1>Rs. 0</h1>
                            <h6 class="success">+ 0%</h6>
                        </details>
                        <p class="text-muted">Compared to Rs. 0 last month</p>
                    </div>
                </div>

            </div> -->
            <!-- Monthly  Report END -->

            <!-- <div class="fast-payment">
                <h2>Fast Payment</h2>
                <div class="badges">
                    <div class="badge">
                        <span class="material-icons-sharp">add</span>
                    </div>
                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>GlobalIME</h5>
                            <h4>Rs. 0</h4>
                        </div> 
                    </div> 
                    <div class="badge">
                        <span class="bg-danger"></span>
                        <div>
                            <h5>Khalti</h5>
                            <h4>Rs. 0</h4>
                        </div>
                    </div>      
                    <div class="badge">
                        <span class="bg-success"></span>
                        <div>
                            <h5>NIC Asia</h5>
                            <h4>Rs. 0</h4>
                        </div> 
                    </div> 
                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Siddhartha Bank</h5>
                            <h4>Rs. 0</h4>
                        </div>  
                    </div>
                    <div class="badge">
                        <span class="bg-success"></span>
                        <div>
                            <h5>Prabhu Bank</h5>
                            <h4>Rs. 0</h4>
                        </div> 
                    </div> 
                    <div class="badge">
                        <span class="bg-success"></span>
                        <div>
                            <h5>Connect IPS</h5>
                            <h4>Rs. 0</h4>
                        </div>  
                    </div>
                    <div class="badge">
                        <span class="bg-danger"></span>
                        <div>
                            <h5>e-Sewa</h5>
                            <h4>Rs. 0</h4>
                        </div>  
                    </div>
                </div>
            </div> -->
            <!-- Fast Payment END -->


            <div class="board">
                <div class="header">
                    <h1>Orders</h1>
                </div>
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Order No.</td>
                            <td>Date</td>
                            <td>Customers</td>
                            <td>SKU</td>
                            <td>Products</td>
                            <td>Status</td>
                            <td>Payments</td>
                        </tr>
                    </thead>
                    <tbody id="orderTable" >
                        <tr>
                            <td class="product-sku">
                                <h5>0001</h5>
                            </td>
                            <td class="product-category">
                                <h5>01-01-2024 </h5>
                            </td>
                            <td class="product-name">
                                <img src="./qq/profile-1.jpg" alt="">
                                <div class="product-description">
                                    <h5>Rahul Jung Kunwar</h5>
                                    <p>Kunwarrahul9861@gmail.com</p>
                                </div>
                            </td>                            
                            <td class="product-sku">
                                <h5>02359215</h5>
                            </td>
                            <td class="product-quantity">
                                <img src="./qq/t-shirt.jpg" alt="">
                                <div class="product-description">
                                    <h5>T-shirt</h5>
                                    <p>This is a t-shirt</p>
                                </div>
                            </td>
                            <td class="delivere">
                                <p>Delivered</p>
                            </td>
                            <td class="order-payment">
                                <h5>Khalti</h5>
                            </td>
                        </tr>

                        <tr>
                            <td class="product-sku">
                                <h5>0002</h5>
                            </td>
                            <td class="product-category">
                                <h5>01-01-2024 </h5>
                            </td>
                            <td class="product-name">
                                <img src="./qq/profile-1.jpg" alt="">
                                <div class="product-description">
                                    <h5>Rahul Jung Kunwar</h5>
                                    <p>Kunwarrahul9861@gmail.com</p>
                                </div>
                            </td>                            
                            <td class="product-sku">
                                <h5>02359215</h5>
                            </td>
                            <td class="product-quantity">
                                <img src="./qq/t-shirt.jpg" alt="">
                                <div class="product-description">
                                    <h5>T-shirt</h5>
                                    <p>This is a t-shirt</p>
                                </div>
                            </td>
                            <td class="dispached">
                                <p>Out for Delivery</p>
                            </td>
                            <td class="order-payment">
                                <h5>Cash On Delivery</h5>
                            </td>
                        </tr>
         
                    </tbody>
                </table>
            </div>
            <!-- <canvas id="chart"></canvas> -->
        </section>
        <!-- MIDDLE END-->

        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>Brands</h2>
                    <a href="#">More <span class="material-icons-sharp">chevron_right</span></a>
                </div>

                <div class="investment">
                    <img src="./qq/Gucci.jpg">
                    <h4>Gucci</h4>
                    <!-- <div class="date-time">
                       <p>Itay</p>
                    </div>
                    <div class="bonds">
                        <p>Luxury fashion</p>
                    </div> -->
                    <div class="amount">
                        <h4>Fashion</h4>
                    </div>
                </div>
                <!-- Investment - 1 END-->

                <div class="investment">
                    <img src="./qq/LV.jpg">
                    <h4>Louis vuitton</h4>
                    <!-- <div class="date-time">
                       <p>France</p> 
                    </div>
                    <div class="bonds">
                        <p>Luxury fashion</p>
                    </div> -->
                    <div class="amount">
                        <h4>Fashion</h4>
                    </div>
                </div>
                <!-- Investment - 2 END-->

                <div class="investment">
                    <img src="./qq/Dior Brand Profile on Brandirectory_com.jpg">
                    <h4>Nike</h4>
                    <!-- <div class="date-time">
                       <p>United State</p> 
                    </div>
                    <div class="bonds">
                        <p>Athletic apparel</p>
                    </div> -->
                    <div class="amount">
                        <h4>Sportswear</h4>
                    </div>
                </div>
                <!-- Investment - 3 END-->

                <!-- <div class="investment">
                    <img src="./qq/Armani Proposal.jpg">
                    <h4>Armani</h4>
                    <div class="date-time">
                       <p>7 Nov, 2023</p> 
                       <small class="text-muted">9:14 PM</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>Rs. 0</h4>
                        <small class="success"> + 0%</small>
                    </div>
                </div> -->
                <!-- Investment - 4 END-->
            </div>
            <!-- Investment END-->

            <div class="recent-transactions">
                <div class="header">
                    <h2>Recent Transactions</h2>
                    <a href="#">More <span class="material-icons-sharp">chevron_right</span></a> 
                </div>

                <div class="transaction">
                    <div class="service">
                        <div class="icon ">
                            <!-- <span class="material-icons-sharp">currency_rupee</span> -->
                            <img src="./Images/pngwing.com.png" alt="">
                        </div>
                        <div class="details">
                            <h4>Aashra Adhikari</h4>
                            <p>22.10.2023</p>
                        </div>
                    </div>
                        <div class="card-details">
                            <div class="details">
                               <p>Saari</p>
                               <small class="text-muted">Khalti</small>
                            </div>
                        </div>
                    <h4 class="income">Rs. 14000</h4>
                </div>
                <!-- TRANSACTION END-->

                <div class="transaction">
                    <div class="service">
                        <div class="icon ">
                            <!-- <span class="material-icons-sharp">currency_rupee</span> -->
                            <img src="./Images/pngwing.com.png" alt="">
                        </div>
                        <div class="details">
                            <h4>Sujan Shrestha</h4>
                            <p>22.10.2023</p>
                        </div>
                    </div>
                        <div class="card-details">
                            <div class="card">
                                <!-- <img src="./Images/khalti.png"> -->
                            </div>
                            <div class="details">
                               <p>Wollen White Coat</p>
                               <small class="text-muted">Khalti</small>
                            </div>
                        </div>
                    <h4 class="income">Rs. 8000</h4>
                </div>
                <!-- TRANSACTION END-->

                <div class="transaction">
                    <div class="service">
                        <div class="icon">
                            <!-- <span class="material-icons-sharp">currency_rupee</span> -->
                            <img src="./Images/pngwing.com.png" alt="">
                        </div>
                        <div class="details">
                            <h4>Rahul Jung Kunwar</h4>
                            <p>22.10.2023</p>
                        </div>
                    </div>
                        <div class="card-details">
                            <div class="card">
                                <!-- <img src="./Images/connect.png"> -->
                            </div>
                            <div class="details">
                               <p>Diptyque</p>
                               <small class="text-muted">Cash On Delivery</small>
                            </div>
                        </div>
                    <h4 class="income">Rs. 9000</h4>
                </div>
                <!-- TRANSACTION END-->

                <div class="transaction">
                    <div class="service">
                        <div class="icon">
                            <img src="./Images/pngwing.com.png" alt="">
                            <!-- <span class="material-icons-sharp">currency_rupee</span> -->
                        </div>
                        <div class="details">
                            <h4>Jayan Dhami</h4>
                            <p>22.10.2023</p>
                        </div>
                    </div>
                        <div class="card-details">
                            <div class="card">
                                <!-- <img src="./Images/khalti.png"> -->
                            </div>
                            <div class="details">
                               <p>Joggers</p>
                               <small class="text-muted">Khalti</small>
                            </div>
                        </div>
                    <h4 class="income">Rs. 2500</h4>
                </div>
                <!-- TRANSACTION END-->

                <div class="transaction">
                    <div class="service">
                        <div class="icon ">
                            <img src="./Images/pngwing.com.png" alt="">
                            <!-- <span class="material-icons-sharp">currency_rupee</span> -->
                        </div>
                        <div class="details">
                            <h4>Rishav Khatiwada</h4>
                            <p>22.10.2023</p>
                        </div>
                    </div>
                        <div class="card-details">
                            <div class="card">
                                <!-- <img src="./Images/khalti.png"> -->
                            </div>
                            <div class="details">
                               <p>Sweat Pants</p>
                               <small class="text-muted">Khalti</small>
                            </div>
                        </div>
                    <h4 class="income">Rs. 2200</h4>
                </div>
                <!-- TRANSACTION END-->

                <div class="transaction">
                    <div class="service">
                        <div class="icon">
                            <img src="./Images/pngwing.com.png" alt="">
                            <!-- <span class="material-icons-sharp">currency_rupee</span> -->
                        </div>
                        <div class="details">
                            <h4>Rajesh Hamal</h4>
                            <p>22.10.2023</p>
                        </div>
                    </div>
                        <div class="card-details">
                            <div class="card ">
                                <!-- <img src="./Images/connect.png"> -->
                            </div>
                            <div class="details">
                               <p> Jeans Pants</p>
                               <small class="text-muted">Cash On Delivery</small>
                            </div>
                        </div>
                    <h4 class="income">Rs. 6000</h4>
                </div>
                <!-- TRANSACTION END-->

                <div class="transaction">
                    <div class="service">
                        <div class="icon">
                            <img src="./Images/pngwing.com.png" alt="">
                            <!-- <span class="material-icons-sharp ">currency_rupee</span> -->
                        </div>
                        <div class="details">
                            <h4>Biraj Bhatta</h4>
                            <p>22.10.2023</p>
                        </div>
                    </div>
                        <div class="card-details">
                            <div class="card ">
                                <!-- <img src="./Images/connect.png"> -->
                            </div>
                            <div class="details">
                               <p> T-Shirt</p>
                               <small class="text-muted">Cash On Delivery</small>
                            </div>
                        </div>
                    <h4 class="income">Rs. 4000</h4>
                </div>
                <!-- TRANSACTION END-->
            </div>
            <!-- --------------RECENT TRANSACTION END--------------------->
        </section>
        <!-- RIGHT END-->
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

    <script src="./JS/main.js"></script>
      <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>