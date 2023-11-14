<!-- connect file -->
<?php

include('../includes/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website using PHP and MySQL.</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- fontawesomelink link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container-fluid">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="../images/logo1.jpg" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../home.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../allproducts.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="user_registration.php">Register</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php ?></sup></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Total Price: <?php ?></a>
                </li>
            </ul>
            <form class="d-flex" action="../search_product.php" method="GET">
                <input class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
                <input type="submit" value="search" name="search_data_product" class="btn btn-outline-dark">
            </form>
            </div>
        </div>
        </nav>
    </div>
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome Guest</a>
            </li>";
            }

            else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'> Welcome ".$_SESSION['username']."</a>
            </li>";
            }

            if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
                <a class='nav-link' href='./user_area/user_login.php'>Login</a>
            </li>";
            }
            
            else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='logout.php'>Logout</a>
            </li>";
            }

            ?>
        </ul>
    </nav>
    <!-- third child -->
    <div class="bg-light">
        <h3 class="text-center">The Store</h3>
        <p class="text-center">The Goals and Visions</p>
    </div>
    <!-- calling cart function -->
    <!-- fourth child -->
    <div class="row">
        <div>
            <?php
            if(!isset($_SESSION['username'])){
                include('user_login.php');
            }
            else{
                include('payment.php');
            }
            ?>
        </div>
       
            </div>

    

    <!-- footer child -->
    <?php
    include("../includes/footer.php")
    ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>