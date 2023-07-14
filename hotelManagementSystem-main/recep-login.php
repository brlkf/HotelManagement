<!DOCTYPE html>
<html>
<head>
    <title>Admin login</title>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
<style>
     h2{
        font-family:"Montserrat",sans-serif;
    }

    h3,h4{
        font-family:"Montserrat",sans-serif;
        color: black;
        font-size: 12px;
    }

    body{
        margin: 0;
        padding: 0;
        font-family: 'Open Sans',sans-serif;
        background:linear-gradient(rgba(0,0,0,0.35),rgba(0,0,0,0.25)), url(bluetears.jpg) no-repeat center;
                    
        background-size: cover;
        height: 100vh;
        overflow: hidden; 
    }

    .center{
        position:absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background:rgb(65,74,76);
        border-radius: 10px;
        opacity:0.8
    }


    input[type=text], input[type=tel], input[type=email], input[type = password], input[type=date],  select{
        margin-bottom: 15px;
        max-width: 300px;
    }

    .field input {
        width: 100%;
        padding: 12px;
        border: 1px solid #dddddd;
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
    
    .forget_login_link {
        margin: 30px 0;
        text-align: center;
        font-size: 16px;
        text-decoration: "login" underline;
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
    </style>
</head>
<body>
    <form action="#" method="POST">
    <div class = "center">
        <h2><p align = "center">Login</h2>
        <p align = "center"><img src="image\logo.png" height="90" width="90" >
        <h3><p align = "center">Welcome Admin!</h3>
        <form method="POST">
            <div id="container">
                    <div class="field">                     
                        <input type = "text" name = "employee_id"  required="required" placeholder="Employee ID">
                    </div>
                   
                    <div class="field" >
                        <input type="password" name="employee_password" required="required" placeholder="Password">
                    </div>    
            
                
                    <div class="field">
                        <input type="submit" name = "submit" value="LOGIN">
                    </div>
                </div>  
        </form> 
                <div class = "forget_login_link">
                     <a style ="color:black;"href="recep-reset-password.php">Forget password</a>
                </div>
            </div>
                       
    </div>
</form>
    <?php
        include("conn.php");
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from Form
        $username=mysqli_real_escape_string($conn,$_POST['employee_id']);
        $password=mysqli_real_escape_string($conn,$_POST['employee_password']);
        
        // Error message if the input field is left blank
        
        $sql="SELECT * FROM employee WHERE employee_id =$username and 
        employee_password ='$password'";
        if ($result=mysqli_query($conn,$sql)){
            // Return the number of rows in result set
            $rowcount=mysqli_num_rows($result);
            }
            while($row=mysqli_fetch_array($result)){
                $position = $row['position'];
            }
            if($rowcount==1) {
                session_start();
                $_SESSION['mySession']=$username;
                if ($position == "receptionist")
                { 
                    header("location:recep-home.php");
                }
                else if ($position == "manager"){
                    header("location:Manager_home.php");
                }
                else if ($position == "room cleaner")
                {
                    header("location:room_cleaner_home.php");
                }

                
               
            }
            else {
                echo '<script>alert("Wrong username or password. Please try again!");
                </script>'; 
            }
            mysqli_close($conn);
            }
    ?>
</body>
</html>    