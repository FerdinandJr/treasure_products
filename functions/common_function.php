<?php
function getProducts(){
    global $con;

    if(!isset($_GET['category'])){
        if(!isset($_GET['brands'])){
    
    $select_products="Select * from `test` order by rand() LIMIT 0,9";
                $result_products=mysqli_query($con, $select_products);

                while($row_data=mysqli_fetch_assoc($result_products)){
                    $product_title=$row_data['product_title'];
                    $product_id=$row_data['product_id'];
                    $product_description=$row_data['product_description'];
                    $product_price=$row_data['product_price'];
                    $product_image1=$row_data['product_image1'];
                    $category_id=$row_data['category_id'];
                    $brand_id=$row_data['brand_id'];

                    echo"
                    <div class='col mb-5'>
                    <div class='card h-100'>
                    <!-- Product image-->
                    <a href='index.php?product_id=$product_id'>
                    <img class='card-img-top' src='./admin_area/product_images/$product_image1'/></a>
                    <!-- Product details-->
                    <div class='card-body p-4'>
                        <div class='text-center'>
                            <!-- Product name-->
                            <h5 class='fw-bolder'>$product_title</h5>
                            <!-- Product price-->
                            ₱$product_price
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                        <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='index.php?add_to_cart=$product_id'>Add to Cart</a></div>
                    </div>
                </div>
                </div>";
                    
                }
            }
        }

}

//display all products
function display_all_Products(){
    global $con;

    if(!isset($_GET['category'])){
        if(!isset($_GET['brands'])){
    
    $select_products="Select * from `test` order by rand()";
                $result_products=mysqli_query($con, $select_products);

                while($row_data=mysqli_fetch_assoc($result_products)){
                    $product_title=$row_data['product_title'];
                    $product_id=$row_data['product_id'];
                    $product_description=$row_data['product_description'];
                    $product_price=$row_data['product_price'];
                    $product_image1=$row_data['product_image1'];
                    $category_id=$row_data['category_id'];
                    $brand_id=$row_data['brand_id'];

                    echo "<div class='col-md-4'>
                    <div class='card' style='width: 18rem;'>
                    <a href='index.php?product_id=$product_id'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top'></a>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>$product_price</p> 
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='index.php?product_id=$product_id' class='btn btn-primary'>View More</a>
                    </div>
                    </div>
                    </div>";
                }
            }
        }

}

//search product function
function searchProducts(){
     global $con;
     if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];

         $select_products="Select * from `test` where product_keywords like 
         '%$search_data_value%'";

         $result_products=mysqli_query($con, $select_products);
         $num_of_rows=mysqli_num_rows($result_products);
         if($num_of_rows==0){
             echo "<h2>NO ITEMS FOR THIS</h2>";
         }

                $result_products=mysqli_query($con, $select_products);
                while($row_data=mysqli_fetch_assoc($result_products)){
                    $product_title=$row_data['product_title'];
                    $product_id=$row_data['product_id'];
                    $product_description=$row_data['product_description'];
                    $product_price=$row_data['product_price'];
                    $product_image1=$row_data['product_image1'];
                    $category_id=$row_data['category_id'];
                    $brand_id=$row_data['brand_id'];

                    echo "
                    <div class='col mb-5'>
                    <div class='card h-100'>
                    <!-- Product image-->
                    <a href='index.php?product_id=$product_id'>
                    <img class='card-img-top' src='./admin_area/product_images/$product_image1'/></a>
                    <!-- Product details-->
                    <div class='card-body p-4'>
                        <div class='text-center'>
                            <!-- Product name-->
                            <h5 class='fw-bolder'>$product_title</h5>
                            <!-- Product price-->
                            $product_price
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                        <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='index.php?add_to_cart=$product_id'>Add to Cart</a></div>
                    </div>
                </div>
                </div>";
                }
            }
}

//get unique categories
function get_unique_Categories(){
    global $con;
    if(isset($_GET['category'])){

    $category_id=$_GET['category'];

    $select_products="Select * from `test` where category_id = $category_id";

                $result_products=mysqli_query($con, $select_products);
                $num_of_rows=mysqli_num_rows($result_products);
                if($num_of_rows==0){
                    echo "<h2>NO STOCK FOR THIS CATEGORY</h2>";
                }

                while($row_data=mysqli_fetch_assoc($result_products)){
                    $product_title=$row_data['product_title'];
                    $product_id=$row_data['product_id'];
                    $product_description=$row_data['product_description'];
                    $product_price=$row_data['product_price'];
                    $product_image1=$row_data['product_image1'];
                    $category_id=$row_data['category_id'];
                    $brand_id=$row_data['brand_id'];

                    echo "
                    <div class='col mb-5'>
                    <div class='card h-100'>
                    <!-- Product image-->
                    <a href='index.php?product_id=$product_id'>
                    <img class='card-img-top' src='./admin_area/product_images/$product_image1'/></a>
                    <!-- Product details-->
                    <div class='card-body p-4'>
                        <div class='text-center'>
                            <!-- Product name-->
                            <h5 class='fw-bolder'>$product_title</h5>
                            <!-- Product price-->
                            ₱$product_price
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                        <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='index.php?add_to_cart=$product_id'>Add to Cart</a></div>
                    </div>
                </div>
                </div>";;
                }
            }
        }

        function get_unique_Brand(){
            global $con;
            if(isset($_GET['brands'])){
        
            $brand_id=$_GET['brands'];
        
            $select_query="Select * from `test` where brand_id = $brand_id";
        
                        $result_query=mysqli_query($con, $select_query);
                        $num_of_rows=mysqli_num_rows($result_query);
                        if($num_of_rows==0){
                            echo "<h2>NO STOCK FOR THIS BRAND</h2>";
                        }
        
                        while($row_data=mysqli_fetch_assoc($result_query)){
                            $product_title=$row_data['product_title'];
                            $product_id=$row_data['product_id'];
                            $product_description=$row_data['product_description'];
                            $product_price=$row_data['product_price'];
                            $product_image1=$row_data['product_image1'];
                            $category_id=$row_data['category_id'];
                            $brand_id=$row_data['brand_id'];
        
                            echo "
                            <div class='col mb-5'>
                            <div class='card h-100'>
                            <!-- Product image-->
                            <a href='index.php?product_id=$product_id'>
                            <img class='card-img-top' src='./admin_area/product_images/$product_image1'/></a>
                            <!-- Product details-->
                            <div class='card-body p-4'>
                                <div class='text-center'>
                                    <!-- Product name-->
                                    <h5 class='fw-bolder'>$product_title</h5>
                                    <!-- Product price-->
                                    ₱$product_price
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='index.php?add_to_cart=$product_id'>Add to Cart</a></div>
                            </div>
                        </div>
                        </div>";
                        }
                    }
                }

                function view_details(){
                    global $con;

                if(isset($_GET['product_id'])){
                    if(!isset($_GET['category'])){
                        if(!isset($_GET['brands'])){
                    $product_id=$_GET['product_id'];
                    $select_products="Select * from `test` where product_id=$product_id";
                                $result_products=mysqli_query($con, $select_products);

                                while($row_data=mysqli_fetch_assoc($result_products)){
                                    $product_title=$row_data['product_title'];
                                    $product_id=$row_data['product_id'];
                                    $product_description=$row_data['product_description'];
                                    $product_price=$row_data['product_price'];
                                    $product_image1=$row_data['product_image1'];
                                    $product_image2=$row_data['product_image2'];
                                    $product_image3=$row_data['product_image3'];
                                    $category_id=$row_data['category_id'];
                                    $brand_id=$row_data['brand_id'];

                    echo "
                    <section class='py-5'>
                    <div class='container px-4 px-lg-5 my-5'>
                        <div class='row gx-4 gx-lg-5 align-items-center'>
                            <div class='col-md-6'><img class='card-img-top mb-5 mb-md-0' src='./admin_area/product_images/$product_image1'/></div>
                            <div class='col-md-6'>
                                <h1 class='display-5 fw-bolder'>$product_title</h1>
                                <div class='fs-5 mb-5'>
                                    <span class='text-decoration-line-through'></span>
                                    <span>₱$product_price</span>
                                </div>
                                <p class='lead'>$product_description</p>
                                <div class='d-flex'>
                                    <a class='btn btn-outline-dark mt-auto' href='index.php?add_to_cart=$product_id'>
                                        <i class='bi-cart-fill me-1'></i>
                                        Add to Cart
                                    </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>";
                                }}
                                }
                                }
                }

                function getIPAddress() {  
                    global $con;
                    //whether ip is from the share internet  
                     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                                $ip = $_SERVER['HTTP_CLIENT_IP'];  
                        }  
                    //whether ip is from the proxy  
                    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
                     }  
                //whether ip is from the remote address  
                    else{  
                             $ip = $_SERVER['REMOTE_ADDR'];  
                     }  
                     return $ip;  
                }  
                // $ip = getIPAddress();  
                // echo 'User Real IP Address - '.$ip;  

                //function cart
                function cart(){
                    if(isset($_GET['add_to_cart'])){
                    global $con;
                    $get_ip_add = getIPAddress(); 
                    $get_product_id=$_GET['add_to_cart'];
                    $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
                    $result_query=mysqli_query($con,$select_query);
                    $num_of_rows=mysqli_num_rows($result_query);
                        if($num_of_rows>0){
                            echo "<script>alert('Item is already added to cart')</script>";
                            echo "<script>window.open('index.php', '_self')</script>";
                        }
                        else{
                            $insert_query="insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id, '$get_ip_add', 0)";
                            $result_query=mysqli_query($con,$insert_query);
                            echo "<script>alert('Item is added to cart')</script>";
                            echo "<script>window.open('index.php', '_self')</script>";
                        }
                    }
                    

                }

                //function cart item numbers
                function cart_item(){
                    global $con;
                    if(isset($_GET['add_to_cart'])){
                    global $con;
                    $get_ip_add = getIPAddress(); 
                    $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                    $result_query=mysqli_query($con,$select_query);
                    $count_cart_items=mysqli_num_rows($result_query);
                    }
                    else{
                        global $con;
                        $get_ip_add = getIPAddress(); 
                        $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                        $result_query=mysqli_query($con,$select_query);
                        $count_cart_items=mysqli_num_rows($result_query);
                        }
                    echo $count_cart_items;
                }

function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="Select * from `test` where product_id='$product_id'";
        $result_product=mysqli_query($con, $select_products);
        while($row_product_price=mysqli_fetch_array($result_product)){
         $product_price=array($row_product_price['product_price']);
         $product_values=array_sum($product_price);
         $total_price+=$product_values;
    }
}
echo $total_price;
}
                

function getBrands(){
    global $con;
    $select_brands="Select * from `brands`";
                $result_brands=mysqli_query($con, $select_brands);

                while($row_data=mysqli_fetch_assoc($result_brands)){
                    $brand_title=$row_data['brand_title'];
                    $brand_id=$row_data['brand_id'];

                    echo "<li><a class='dropdown-item' href='index.php?brands=$brand_id'>$brand_title</a></li>";
                }

}

function getCategories(){
    global $con;
    $select_categories="Select * from `categories`";
    $result_categories=mysqli_query($con, $select_categories);

    while($row_data=mysqli_fetch_assoc($result_categories)){
        $category_title=$row_data['category_title'];
        $category_id=$row_data['category_id'];
        echo "<li><a class='dropdown-item' href='index.php?category=$category_id'>$category_title</a></li>";
    }

}



//get user order details
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="Select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con, $get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_profile'])){
            if(!isset($_GET['user_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query=mysqli_query($con, $get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h3 class='text-center text-success my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>";
                    }
                    else{
                        echo "<h3 class='text-center text-success my-5'>You have no pending orders</h3>";
                    }
                }
            }
        }
    }
}
?>