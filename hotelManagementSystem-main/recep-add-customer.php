<?php
include ("conn.php");
    $customer_name= $_POST['customer_name']; 
    $customer_password = $_POST['customer_password'];
    $customer_nationality = $_POST['customer_nationality'];
    $customer_phone_no = $_POST['customer_phone_no'];
    $customer_email = $_POST['customer_email'];
    $ic_no = $_POST['ic_no'];
    $passport_no = $_POST['passport_no'];
   
    $sql="INSERT INTO registered_customer (customer_name,customer_password,customer_nationality,customer_phone_no,
    customer_email,ic_no,passport_no)
        VALUES ('$customer_name','$customer_password','$customer_nationality','$customer_phone_no','$customer_email','$ic_no'
        ,'$passport_no')";
        $result=mysqli_query($conn,$sql);
        if (!$result) {
          die('Error: ' . mysqli_error($conn));
        }
        else{
            
                    mysqli_close($conn);
                    echo '<script>alert("Payment is done succeessfully !");
                    </script>';
                    header('Location: recep-customer.php');
                }
        
        
    ?>