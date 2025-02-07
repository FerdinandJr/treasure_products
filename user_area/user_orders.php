<?php
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website using PHP and MySQL.</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- fontawesomelink link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $get_user = "select * from `user_table` where username = '$username'";
        $result=mysqli_query($con, $get_user);
        $row_result=mysqli_fetch_assoc($result);
        $user_id =$row_result['user_id'];
    ?>

        <form method="post">
        <div class="container">
        <div class="row">
            <table class="mt-5">
                <thead>
                    <tr >
                        <th>#</th>
                        <th>Amount Due</th>
                        <th>Total Products</th>
                        <th>Invoice number</th>
                        <th>Date</th>
                        <th>Completed</th>
                        <th>Status</th>
                    </tr>
            </table>

            <?php
            $get_user_details="select * from `user_orders` where user_id=$user_id";
            $result_orders=mysqli_query($con, $get_user_details);
            while($row_orders=mysqli_fetch_assoc($result_orders)){
                $order_id=$row_orders['order_id'];
                $amount_due=$row_orders['amount_due'];
                $total_products=$row_orders['total_products'];
                $invoice_number=$row_orders['invoice_number'];
                $order_date=$row_orders['order_date'];
                $order_status=$row_orders['order_status'];

                if($order_status=='pending'){
                    $order_status='Incomplete';
                }
                else{
                    $order_status='Complete';
                }
                $number=1;
                
                echo "
                <table class='mt-5 bg-light'>
                <thead>
                <tr >
                <th>$number</th>
                <th>$amount_due</th>
                <th>$total_products</th>
                <th>$invoice_number</th>
                <th>$order_date</th>
                <th>$order_status</th>";
                ?>
                <?php

                if($order_status=='Complete'){
                    echo "<td>Paid</td>";
                }

                else{
                echo "<th><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></th>
                </tr> ";
                }
            $number++;
            }

            ?>

            
           
        </tbody>       
</table>
</body>
</html>