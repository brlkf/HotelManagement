<!DOCTYPE html>
<html>
<head>
    <title>customer login</title>
    <link rel = "stylesheet" href="style.css">
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
    <form action="recep-update-password.php" method="POST">
    <div class = "center">
        <h2><p align = "center">Reset Password</h2>
        <p align = "center"><img src="image\logo.png" height="90" width="90" >
        
        <form method="POST">
            <div id="container">
                    <div class="field">                     
                        <input type = "text" name = "employee_email"  required="required" placeholder="Email Address">
                    </div>
                   
                    <div class="field" >
                        <input type="password" name="employee_password" required="required" placeholder="New Password">
                    </div>    
            
                
                    <div class="field">
                        <input type="submit" name = "submit" value="CONFIRM">
                    </div>
                </div>  
        </form> 
               
            </div>
                       
    </div>
</form>
    
</body>
</html>    