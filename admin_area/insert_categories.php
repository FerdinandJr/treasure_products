<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];
    $insert_query="insert into `categories` (category_title) values('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo"<script>alert('category has been inserted')</script>";
    }
}   
?> 

<form action="" method="POST" class="mb-2">
<div class="container">
<h1 class="d-flex justify-content-center">Insert Category</h1>
<div class="input-group w-90 mb-2 ">
  <span class="input-group-text" id="basic-addon1">@</span>
  <input type="text" class="form-control" placeholder="Insert categories" name="cat_title" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-90 mb-2 ">
  <input type="submit" class="form-control" name="insert_cat" value="Insert Categories" placeholder="Insert categories" name="insert_cat" aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
</form>