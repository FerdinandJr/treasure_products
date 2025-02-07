<!-- connect file -->
<?php
include('../includes/connect.php');
if(isset($_GET['edit_profile'])){

    $user_session_name=$_SESSION['username'];
    $select_query = "select * from `user_table` where username='$user_session_name'";
    $result_query=mysqli_query($con, $select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];


    if(isset($_POST['user_update'])){
    $update_id=$user_id;
    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");

    //update query
    $select_query_update ="update `user_table` set username='$username', user_email='$user_email', user_address='$user_address', user_image='$user_image', user_mobile='$user_mobile' where user_id='$update_id'";
    $result_query_update=mysqli_query($con, $select_query_update);
    if($result_query_update){
        echo "<script>alert('Data updated successfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    }
}


?>

            <div class="card-body p-md-5 text-black">
              <form action="" method="post" enctype="multipart/form-data">
              <h3 class="mb-4 text-uppercase">Edit Info</h3>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1m" class="form-control form-control-lg" name="username" value="<?php echo $username ?>" />
                    <label class="form-label" for="form3Example1m" >Username</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1n" class="form-control form-control-lg" name="user_email" value="<?php echo $user_email ?>" />
                    <label class="form-label" for="form3Example1n" >Email</label>
                  </div>
                </div>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="form3Example8" class="form-control form-control-lg" name="user_password"/>
                <label class="form-label" for="form3Example8" >Password</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="form3Example3" class="form-control form-control-lg" name="conf_user_password" />
                <label class="form-label" for="form3Example3" >Confirm Password</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="form3Example2" class="form-control form-control-lg" name="user_address" value="<?php echo $user_address?>"/>
                <label class="form-label" for="form3Example2" >Address</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="form3Example2" class="form-control form-control-lg" name="user_mobile" value="<?php echo $user_mobile?>"/>
                <label class="form-label" for="form3Example2" >Contact #</label>
              </div>

              <div class="form-outline mb-4">
                <input type="file" id="form3Example2" class="form-control form-control-lg" name="user_image"/>
                <label class="form-label" for="form3Example2" >Profile Picture</label>
              </div>

              <div class="form-outline mb-4">
                <input type="submit" id="form3Example2" class="form-control form-control-lg bg-warning" value="Save" name="user_update"/>
              </div>
              
              </form>
            </div>

