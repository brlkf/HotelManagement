<!DOCTYPE html>
<html>
    <head>
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
        color: darkred;
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
</head>

<div class="navigation_bar">
    <img src="Blue Tears Logo" class="logo">
    <ul>
        <li><a href="cus_home(log in).php">Home</a></li>
        <li><a href="cus_points.php">Points</a></li>
        <li><a class="login" href="cus_current_booking.php">Current Booking</a></li>
        <li class="dropdown"><button class="dropbtn">Profile</button>
        <div class="dropdown-login"><br><div align="center">
            <?php
              include "conn.php";
              $name= $_SESSION['mySession'];
              $query ="SELECT * FROM registered_customer WHERE customer_password = '$name'";
              $result=mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($result)) {
                echo '<div style="float:center; border:no-border #000 solid; padding:5px; margin: 5px;">';
                echo '<img src="data:image/jpg;base64,' . base64_encode($row['customer_profile_pic']) .'" style="border-radius:50%;" width="100" height="100"/><br>';
                echo '</div>'; 
                mysqli_close($conn);
              }
              ?>
              </div> <hr>
            <a class="login" href="cus_purchase_history.php">Purchase History</a>
            <hr>
            <a class="login" href="cus_profile.php">Edit Profile</a>
            <hr>
            <a class="login" href="cus_log_out.php">Log Out</a>
        </div></li>
    </ul>
    </div>
</html>

