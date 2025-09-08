  
   <header class="header">
         <nav class="navbar navbar-expand-lg">
            <a href="home.html" class="navbar-brand"><img class="navlogo img-fluid" src="./assets/image/logo.png"
                  lt="logo"></a>
            <button type="button" onclick="myFunction()" class="navbar-toggler" data-bs-toggle="collapse"
               data-bs-target="#responsivenav" aria-controls="responsivenav" aria-expanded="false"
               aria-label="Toggle navigation" >
               <span  id="navbar-toggler-icon" class="navbar-toggler-icon"></span>
               <span  id="navbar-toggler-icon" class="navbar-toggler-icon"></span>
               <span  id="navbar-toggler-icon" class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="responsivenav">
               <ul class="navbar-nav mx-auto">
                  <li class="nav-item"><a class="nav-link " href="home.php">Home</a></li>
                  <li class="nav-item"><a class="nav-link " href="about.php">About</a></li>
                  <li class="nav-item"><a class="nav-link " href="shop.php">Shop</a></li>
                  <li class="nav-item"><a class="nav-link " href="contact.php">contact</a></li>
                  <li class="nav-item"><a class="nav-link " href="orders.php">order</a></li>
               </ul>
            </div>
            <div class="nav-icons">
               <!-- <a href="search_page.php" class="fas fa-search"></a> -->
               <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE id = '$user_id'");
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
               ?>
               <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
               <div onclick="myfunction1()" class="fas fa-user user-icon">     </div>
            </div>
            <div class="user-box" id="user-btn">
                     <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                     <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                     <a href="logout.php" class="delete-btn">logout</a>               
            </div>           
         </nav>
   </header>

  

   
