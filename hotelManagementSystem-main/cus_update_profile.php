
    <?php 
    
    
        include("conn.php");
        if(!empty($_FILES['profile_image']['name'])){
            $image = $_FILES['profile_image']['tmp_name'];
            $img = file_get_contents($image);
            $sql = "UPDATE registered_customer SET 
            customer_name='$_POST[username]',
            customer_phone_no='$_POST[phone_no]',
            customer_email='$_POST[email]',
            customer_profile_pic =?
            WHERE customer_password='$_POST[password]';";
            
            $stmt = mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt,"s",$img);
            mysqli_stmt_execute($stmt);
            $check = mysqli_stmt_affected_rows($stmt);
        
	

                if($check == 1){
                echo "<script>alert('personal detail edited ^^'); window.location.href='cus_home(log in).php';</script>";
                mysqli_close($conn);
                }
                else{
                echo "Fail to upload";
                die('Error: ' . mysqli_error($conn));
                }
}
                else{
                    $sql = "UPDATE registered_customer SET 
                    customer_name='$_POST[username]',
                    customer_phone_no='$_POST[phone_no]',
                    customer_email='$_POST[email]'
                

                    WHERE customer_password='$_POST[password]';";

                if (!mysqli_query($conn,$sql)){
                    echo "Fail to upload";
                    die('Error: ' . mysqli_error($conn));
                }
                else{
                    echo "<script>alert('Personal detail edited ^^'); window.location.href='cus_home(log in).php';</script>";
                    mysqli_close($conn);
                }

                  
                }
            
    ?>
    
