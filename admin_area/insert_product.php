<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $category_id=$_POST['category_id'];
    $brand_id=$_POST['brand_id'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    
    if($product_title =='' or $product_description=='' or $product_keywords=='' or $product_price=='' or $brand_id=='' or $category_id==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }

    else{
        

        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //insert query
        $insert_products="insert into `test` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, product_status)
        values ('$product_title', '$product_description', '$product_keywords', '$category_id', '$brand_id', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Successfully Inserted the products')</script>";
        }
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body style="text-align: center; justify-content: center">
        <div class="input-group mb-3 m-5">
        <h1 style="margin-left: 400px; margin-bottom: 100px">Insert Products</h1>
        <div class="container text-center">
  <div class="row align-items-start">
        <div class="col">
        <form action="" method="post" enctype="multipart/form-data">
        <h4>Product title</h4>
        <input type="text" class="form-control" 
        name="product_title"  
        id="product_title" 
        aria-label="Username" required="required"aria-describedby="basic-addon1">
        <h4>Product Description</h4>
        <input type="text" class="form-control" 
        name="product_description"  id="product_description" aria-label="Username" required="required"aria-describedby="basic-addon1">
        <h4>Product Keywords</h4>
        <input type="text" class="form-control" name="product_keywords" id="product_keywords" aria-label="Username" aria-describedby="basic-addon1">
    
        <select name="category_id" class="form-select mt-5 mb-5" required="required" aria-label="Default select example">
            <option>Select Category</option>
            <?php 
                $select_categories="Select * from `categories`";
                $result_categories=mysqli_query($con, $select_categories);

                while($row_data=mysqli_fetch_assoc($result_categories)){
                    $category_title=$row_data['category_title'];
                    $category_id=$row_data['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
        </select>
        <select name="brand_id" class="form-select mb-5" required="required" aria-label="Default select example">
            <option>Select Brands</option>
            <?php 
                $select_brands="Select * from `brands`";
                $result_brands=mysqli_query($con, $select_brands);

                while($row_data=mysqli_fetch_assoc($result_brands)){
                    $brand_title=$row_data['brand_title'];
                    $brand_id=$row_data['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
        </select>
        </div>
            <div class="col">

        <div style="width:300px; margin-left: 50px">
        <label for="basic-url" class="form-label m-auto">Image 1</label>
        <div class="input-group mb-3">
        <input type="file" name="product_image1"class="form-control" placeholder ="No file chosen" required="required" id="basic-url" aria-describedby="basic-addon3">
        </div>
        <label for="basic-url" class="form-label">Image 2</label>
        <div class="input-group mb-3">
        <input type="file" name="product_image2" class="form-control" placeholder ="No file chosen"  required="required" id="basic-url" aria-describedby="basic-addon3">
        </div>
        <label for="basic-url" class="form-label">Image 3</label>
        <div class="input-group mb-3">
        <input type="file" name="product_image3" class="form-control" placeholder ="No file chosen" required="required" id="basic-url" aria-describedby="basic-addon3">
        </div>

        <h4>Price</h4>
        <input type="text" class="form-control" name="product_price" aria-label="Username"  aria-describedby="basic-addon1">

        <input class="btn btn-primary m-5" name="insert_product" type="submit" value="Insert Product">
        </form>
            </div>
            </div>
            </div>
        </div>
</body>
</html>