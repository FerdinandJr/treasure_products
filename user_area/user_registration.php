<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="../home.php"><i class="fa-solid fa-shop me-2"></i> <strong>TREASURE PRODUCTS</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
          <div class="input-group">
 
          </div>
        </div>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <div class="ms-auto d-none d-lg-block">
            <div class="input-group">
            </div>
          </div>
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="../home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="#">All Products</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="user_login.php"><i class="fa-solid fa-circle-user me-1"></i></a>
            </li>
            <li class="nav-item">
            <a href="../cart.php">
            <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php cart_item();?></span>
                        </button>
                        </a>
            </li>
            <?php
            if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link mx-2 text-uppercase' href='user_login.php'><i class='fa-solid fa-circle-user me-1'></i>Login</a>
          </li>";
            }
            else{
              echo "<li class='nav-item'>
              <a class='nav-link mx-2 text-uppercase' href='logout.php'><i class='fa-solid fa-circle-user me-1'></i>Logout</a>
            </li>";
          }
          ?>
          </ul>
        </div>
      </div>
    </nav>
        <!-- Header-->
      
        <!-- Section-->
        <!-- Section: Design Block -->
        <div class="container py-5">
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col">
      <div class="card my-4 shadow-3">
        <div class="row g-0">
          <div class="">
            <div class="card-body p-md-5 text-black">
              <form action="" method="post" enctype="multipart/form-data">
              <h3 class="mb-4 text-uppercase">Register Info</h3>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1m" class="form-control form-control-lg" name="user_username"/>
                    <label class="form-label" for="form3Example1m" >Username</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1n" class="form-control form-control-lg" name="user_email" />
                    <label class="form-label" for="form3Example1n" >Email</label>
                  </div>
                </div>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="form3Example8" class="form-control form-control-lg" name="user_password"/>
                <label class="form-label" for="form3Example8" >Password</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="form3Example3" class="form-control form-control-lg" name="conf_user_password" />
                <label class="form-label" for="form3Example3" >Confirm Password</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="form3Example2" class="form-control form-control-lg" name="user_address"/>
                <label class="form-label" for="form3Example2" >Address</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="form3Example2" class="form-control form-control-lg" name="user_mobile"/>
                <label class="form-label" for="form3Example2" >Contact #</label>
              </div>

              <div class="form-outline mb-4">
                <input type="file" id="form3Example2" class="form-control form-control-lg" name="user_image"/>
                <label class="form-label" for="form3Example2" >Profile Picture</label>
              </div>

              <div class="form-outline mb-4">
                <input type="submit" id="form3Example2" class="form-control form-control-lg bg-warning" value="Register" name="user_register"/>
              </div>
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Section: Design Block -->
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>


<!-- php code -->
<?php
    if(isset($_POST['user_register'])){
        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
        $conf_user_password=$_POST['conf_user_password'];
        $user_address=$_POST['user_address'];
        $user_email=$_POST['user_email'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        $user_mobile=$_POST['user_mobile'];
        $user_ip=getIPAddress();


        $select_query = "select * from `user_table` where username = '$user_username' or user_email='$user_email'";
        $result=mysqli_query($con, $select_query);
        $rows_count=mysqli_num_rows($result);

        if($rows_count>0){
            echo "<script>alert('User already registered')</script>";
        }
        else if($user_password!=$conf_user_password){
            echo "<script>alert('Password do not match')</script>";
        }
        else{
            //insert query
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");
            $insert_query = "insert into `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) 
            values ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_mobile') ";
    
            $sql_execute=mysqli_query($con, $insert_query);
    
            if($sql_execute){
                echo "<script>alert('User Successfully Inserted')</script>";
            }
            else{
                die(mysqli_error($con));
            } 
        }

    //selecting cart items
        $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
        $result_cart=mysqli_query($con, $select_cart_items);
        $row_count=mysqli_num_rows($result_cart);
        if($rows_count>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items in cart')</script>";
            echo "<script>windows.open('checkout.php','_self')</script>";
        }
        else{
            echo "<script>windows.open('../index.php','_self')</script>";
        }
    }
?>