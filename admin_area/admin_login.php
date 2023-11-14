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
        <title>Treasure Products</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <!-- Header-->
        
        <!-- Section-->
        <!-- Section: Design Block -->
        <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <form action="" method="post" enctype="multipart/form-data">
              <h2 class="fw-bold mb-2 text-uppercase">ADMIN</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4">
                <input type="text" id="username" class="form-control form-control-lg" name="admin_username"/>
                <label class="form-label" for="username">Admin Username</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="admin_password"/>
                <label class="form-label" for="typePasswordX">Admin Password</label>
              </div>
              <div>
              <label class="m-3" >Admin Username: admin</label>
              </div>
              <div>
              <label class="m-3" >Admin Password: 1234</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="admin_login">Login</button>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              </p>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
        <!-- Footer-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

<?php
if(isset($_POST['admin_login'])){

    $user_username=$_POST['admin_username'];
    $user_password=$_POST['admin_password'];



    $select_query="Select * from `admin_table` where admin_username='$user_username'";
    $result=mysqli_query($con, $select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    

        $_SESSION['admin_username']=$user_username;
        if($row_count>0){
            //echo "<script>alert('Login Successful')</script>";
                $_SESSION['admin_username']=$user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('admin_dashboard.php','_self')</script>";
        }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }



?>