<!DOCTYPE html>
<html>
<head>
    <title>document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<style>
    h2{
        font-family:"Montserrat",sans-serif;
        color:white;
    }

    h3,h4{
        font-family:"Montserrat",sans-serif;
        color: #adadad;
        font-size: 12px;
    }

    body{
        margin: 0;
        padding: 0;
        font-family: 'Open Sans',sans-serif;
        background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),
    url("Blue Tears 1.JPG");
    background-repeat: no-repeat;
    background-size: 2000px 1000px; 
    }

    .center{
        position:absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background: #383838;
        border-radius: 10px;
    }


    input[type=text], input[type=tel], input[type=email], input[type = password], input[type=date],  select{
        margin-bottom: 15px;
        max-width: 300px;
    }

    .field input {
        width: 100%;
        padding: 12px;
        border: 2.5px solid #dddddd;
        font-size: 12px;
        border-radius: 4px;
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        margin-bottom: 15px;
    }

	
    input[type = "submit"]{
        width: 80%;
        height: 50px;
        border: 1px solid;
        background:#2691d9 ;
        border-radius: 20px;
        font-size: 13px;
        color: #e9f4fb;
        font-weight: 700;
        cursor: pointer;
        outline: none;
    }
    
    input:valid {
        border-color: green;
    }

    input:invalid:not(:focus):not(:placeholder-shown) {

        border: 2px solid #c92432;
        color: #c92432;
        background: #fffafa;
    }

    input:not(:focus):not(:placeholder-shown):invalid ~ .requirements {
        display: block;
        max-height: 200px;
        padding: 0 30px 20px 50px
    }

    .requirements {
        padding: 0 30px 0 50px;
        max-height: 0;
        transition: 0.28s;
        overflow: hidden;
        color: red;
        font-style:italic;
        font-size: 10px;
      }
    
    .forget{
        margin:0 auto;
    }
    </style>
</head>
<body>

<?php
include ("conn.php");

    $email = $_POST['email'];
    $sql="SELECT * FROM registered_customer WHERE customer_email = '$email'";
    if ($result=mysqli_query($conn,$sql)){
        // Return the number of rows in result set
        $rowcount=mysqli_num_rows($result);
        }
        if($rowcount==1) {
        }
        else {
            echo '<script>alert("Wrong email. Please try again!");window.history.go(-1);
            </script>'; 
        }
        
?>
    <form action="cus_update_password.php" method="POST">
    <div class = "center">
        <h2><p align = "center">Reset Password</h2>
        <p align = "center"><img src="Blue Tears Logo.png" height="90" width="90" >
        <h3><p align = "center">Please enter your information below</h3>
            <div id="container">
                    <div class="field">                     
                        <input type = "text" name = "password"  required="required" placeholder="New Password">
                    </div>

                    <div class="field">                     
                        <input type = "hidden" name = "email"  value=<?php echo $_POST['email'];?>>
                    </div>    
            
                
                    <div class="field">
                        <input type="submit" name = "submit" class="btn" value="Reset Password">
                    </div>
                  
            </form>
        </div>
            