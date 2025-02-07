<!-- connect file -->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Treasure Products</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-shop me-2"></i> <strong>TREASURE PRODUCTS</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
          <div class="input-group">
            <span class="border-dark input-group-text bg-dark text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" class="form-control border-warning" style="color:#7a7a7a">
            <button class="btn btn-dark text-white">Search</button>
          </div>
        </div>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <div class="ms-auto d-none d-lg-block">
            <div class="input-group">
              <form class="d-flex" action="search_product.php" method="get">
              <input type="text" class="form-control border-dark" style="color:#7a7a7a" name="search_data">
              <input type="submit" class="btn btn-dark text-white" style="color:#7a7a7a" name="search_data_product" value="Search">
               </form>
            </div>
          </div>
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="allproducts.php">All Products</a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">BRANDS</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    getBrands();
                    ?>
                </ul>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">CATEGORIES</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                    getCategories();
                    ?>
                </ul>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto ">
          <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link mx-2 text-uppercase' href='user_area/user_login.php'><i class='fa-solid fa-circle-user me-1'></i>Guest</a>
          </li>";
            }
            else{
              echo "<li class='nav-item'>
              <a class='nav-link mx-2 text-uppercase' href='./user_area/profile.php'><i class='fa-solid fa-circle-user me-1'></i>".$_SESSION['username']."</a>
            </li>";
          }
          ?>
            <li class="nav-item">
            <a href="cart.php">
            <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php cart_item();?></span>
                        </button>
                        </a>
            </li>
            <?php
            if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link mx-2 text-uppercase' href='user_area/user_login.php'><i class='fa-solid fa-circle-user me-1'></i>Login</a>
          </li>";
            }
            else{
              echo "<li class='nav-item'>
              <a class='nav-link mx-2 text-uppercase' href='./user_area/logout.php'><i class='fa-solid fa-circle-user me-1'></i>Logout</a>
            </li>";
          }
          ?>
          </ul>
        </div>
      </div>
    </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Treasure Products</h1>
                    <p class="lead fw-normal text-white-50 mb-0">All Items</p>
                </div>
            </div>
        </header>
        <?php
view_details();
        ?>
        <!-- Section-->
        <section class="py-5">
        <div class='container px-4 px-lg-5 mt-5'>
            <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>
                        <?php
                        cart();
                        searchProducts();
                        get_unique_Brand();
                        get_unique_Categories();
                        ?>
            </div>
        </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Ferdinand 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
