<!DOCTYPE html>
<html lang="en">
<head>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- fontawesomelink link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- php code to access user id -->
    <?php
    include('../functions/common_function.php');
    include('../includes/connect.php');
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";

    $result=mysqli_query($con, $get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id']


    ?>
    <div class="container">
    <h1 class="text-center text-info">Confirm Order</h1>
    <div class="row">
        <div class="col-md-6">
        <h1 class="text-center text-info">Go to profile to pay order</h1>
        <a href=""></a>
        </div>
        <div class="col-md-6">
        <h1 class="text-center text-info"> <a href="order.php?user_id=<?php echo $user_id?>">Continue</a></h1>
       
        </div>
    </div>
    </div>
</body>
</html>