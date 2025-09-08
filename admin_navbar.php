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
                  <li class="nav-item"><a class="nav-link " href="admin_page.php">Home</a></li>
                  <li class="nav-item"><a class="nav-link " href="admin_product.php">Products</a></li>
                  <li class="nav-item"><a class="nav-link " href="admin_order.php">Orders</a></li>
                  <li class="nav-item"><a class="nav-link " href="admin_user.php">Users</a></li>
                  <li class="nav-item"><a class="nav-link " href="admin_messege.php">Massages</a></li>
               </ul>
            </div>
            <div class="nav-icons">
               <div onclick="myfunction1()" class="fas fa-user user-icon">
               </div>
            </div>
                  <div class="user-box" id="user-btn">
                     <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
                     <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
                     <a href="logout.php" class="delete-btn">logout</a>
                  
               </div>
            
         </nav>

   </header>
