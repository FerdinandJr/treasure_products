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
        <a class="navbar-brand" href="home.php"><i class="fa-solid fa-shop me-2"></i> <strong>TREASURE PRODUCTS</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
        
        </div>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <div class="ms-auto d-none d-lg-block">
            
          </div>
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="home.php">Home</a>
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
        <!-- Section-->
        <div class="bg-light">
        <form method="post">
        <div class="container">
        <div class="row">
            <table class="mt-5">
                <thead>
                    <tr >
                        <th style="width: 950px">Products</th>
                        <!-- <th>Quantity</th> -->
                        <!-- <th>Update Quantity</th> -->
                        <th>Total Price</th>
                    </tr>
                    </tr>
            </table>
        </div> 
        </div>
    </div> 
    <?php
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    $result_count=mysqli_num_rows($result);
    if($result_count>0){
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $product_quantity=$row['quantity'];
        $select_products="Select * from `test` where product_id='$product_id'";
        $result_product=mysqli_query($con, $select_products);
        while($row_product_price=mysqli_fetch_array($result_product)){
         $product_price=array($row_product_price['product_price']);
         $product_table=$row_product_price['product_price'];
         $product_title=$row_product_price['product_title'];
         $product_image1=$row_product_price['product_image1'];
         $product_values=array_sum($product_price);
         $total_price+=$product_values;

    ?> 
    <div class="container">
        <div class="row">
            <table class="mt-5">
                <thead>
                    <tr>
                        <td style="width: 130px"><input type="checkbox" name="removeitem[] " value="<?php  echo $product_id?>"></td>
                        <td style="width: 210px"><?php echo $product_title ?></td>
                        <td style="width: 260px"><img src="./admin_area/product_images/<?php echo $product_image1 ?>" style="width:50px" alt=""></td>
                        <!-- <td style><?php echo $product_quantity?></td> -->
                        <!-- <td style="width: 160px"><input type="text" name="qty" class="form-control" style="width: 50px"></td> -->
                        <?php
                        $get_ip_add = getIPAddress();
                        if(isset($_POST['update_cart'])){
                            $quantities=$_POST['qty'];
                            $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                            $result_products_quantity=mysqli_query($con,$update_cart);
                            $total_price=$total_price*$quantities;
                        }
                        ?>
                        <!-- <td><input type="submit" name="update_cart" value="Update" style="width:100px" ></td> -->
                        <td style="width: 210px;">₱<?php echo $product_table ?></td>
                        
                    </tr>
                    </tr>
                </thead>
        </table>
                
        </div>
        </div>

        <?php     
        }
    }

}
else{
    
    echo "<div class='container mt-5 text-center'><h2>NO ITEMS IN THE CART</h2></div>";
}
?>
        <div class='container'>
        <p class="mt-5 fw-bold">SubTotal:</p>
        <p class='fw-bold'><?php echo $total_price ?></p>
        <td><input type="submit" class='btn btn-danger' name="remove_cart" value="Remove" style="width:100px" ></td>
        <?php
        if(isset($_SESSION['username'])){
            echo "<td>
                <a href='./user_area/payment.php' class='btn btn-primary'>Check Out</a>
            </td>";
            }

            else{
                echo "<td>
                <a href='./user_area/user_login.php' class='btn btn-primary'>Check Out</a>
            </td>";
            }
        ?>
        
        </div>
    </div>
</form>

<?php 

function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="Delete from `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($con, $delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo $remove_item=remove_cart_item();

?>
    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <!-- fourth child -->

    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <?php
            view_details();
            get_unique_Brand();
            get_unique_Categories();
            ?>
            </div>
            </div>


    <!-- footer child -->

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
