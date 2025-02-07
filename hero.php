<?php
session_start();
include('./includes/connect.php');
include('./functions/common_function.php');
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

    <header>
  <!-- Intro settings -->
  <style>
    /* Default height for small devices */
    #intro-example {
      height: 400px;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }
  </style>

  <!-- Navbar -->

  <!-- Background image -->
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.7); height: 1000px;">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Treasure Products</h1>
          <h5 class="mb-4">What are you? </h5>
          <a
            class="btn btn-outline-light btn-lg m-2 "
            href="home.php"
            role="button"
            rel="nofollow"
            target="_blank"
          >USER</a
          >
          <a
            class="btn btn-outline-light btn-lg m-2"
            href="./admin_area/admin_login.php"
            target="_blank"
            role="button"
          >ADMIN</a
          >
        </div>
      </div>
    </div>

  <!-- Background image -->
</header>
        <!-- Header-->
        <div class="container">
        <h1 class="display-4 fw-bolder text-center mt-5">Featured Products</h1>
        </div>
        <!-- Section-->
        <section class="py-5">
        <div class='container px-4 px-lg-5 mt-5'>
            <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>
                        <?php
                        getProducts();
                        ?>
            </div>
        </div>
        </section>
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Treasure Products</h1>
                    <p class="lead fw-normal text-white-50 mb-0">All Items</p>
                </div>
            </div>
        </header>
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
