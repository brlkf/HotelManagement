<style>
    h2{
    font-size: 30px;
    margin-right:300px;
    color:white
    }

    body{
        margin:0;
    }
    .navigation_bar{
    height:100px;
    width:100%;
    padding:10px 0;
    display:flex;
    align-items: center;
    justify-content: space-between;
    }

    .logo{
        width:100px;
        margin-left:105px;
        cursor:pointer;
    }
    .navigation_bar ul li{
        list-style:none;
        display:inline-block;
        margin:0 30px;
    }
    .navigation_bar ul li a{
        text-decoration:none;
        font-size:20px;
        color:white;
        text-transform: uppercase;
    }

    .navigation_bar ul li a:hover{
    color: darkred;
    }   

    .dropdown{
    position: relative;
    display: inline-block;
    }

    .dropdown-login {
        margin-left:25px;
        border-radius:10px;
        align-items:center;
        display: none;
        position: absolute;
        background:rgba(70,70,70,0.5);
        min-width: 160px;
    }
    
    .dropdown-login a {  
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    
    .dropdown:hover .dropdown-login {display: block;}

    .dropbtn{
        font-family:'Times New Roman', Times, serif;
        border:none;
        text-decoration:none;
        font-size:20px;
        color:white;
        text-transform: uppercase
    }

    .dropbtn:hover{
        background:transparent;
    }
    button{
    height:50px;
    width:300px;
    font-size: 20px;
    border-radius: 25px;
    border: 2px solid black;
    background:transparent
}
    hr{
        border-top:1px white;
    }

</style>
<div class="navigation_bar">

            <img src="Blue Tears Logo" class="logo">
            <ul></ul><ul></ul><ul></ul>       
                
            <ul>
                <li><a href="home.php">Home</a></li> 
                <li class="dropdown"><button class="dropbtn">Log In</button>
                <div class="dropdown-login">
                    <a class="login" href="recep-login.php">Log In as Admin</a>
                    <hr>
                    <a class="login" href="cus_log_in.php">Log In as Customer</a>
                </div></li>
                <li><a href="cus_sign_up.php">Sign Up</a></li>
            </ul>
            <ul>
                
                
            </ul>
            </div>