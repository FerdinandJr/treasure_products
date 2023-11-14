<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];
    $insert_query="insert into `brands` (brand_title) values('$brand_title')";
    
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo"<script>alert('brand has been inserted')</script>";
    }
}
?>

<form action="" method="POST" class="mb-2">
<h1 class="d-flex justify-content-center">Insert Brand</h1>
<div class="container">
<div class="input-group w-90 mb-2 ">
  <span class="input-group-text" id="basic-addon1">@</span>
  <input type="text" class="form-control" placeholder="Insert Brands" name="brand_title" aria-label="Brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-90 mb-2 ">
  <input type="submit" class="form-control" name="insert_brand" value="Insert Brands" placeholder="Insert Brands" name="brand_title" aria-label="Brands" aria-describedby="basic-addon1">
</div>
</div>
</form>