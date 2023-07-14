<!DOCTYPE html>
<html>
    <head>
        <?php include "cus_session.php"?>
        <title>Menu</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <style>body{
                margin:0;
                background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),
                url("Hotel2.png");
                background-repeat: no-repeat;
                background-size: 1600px 800px;}

                .b1{
                    height:50px;
                    width:300px;
                    font-size: 20px;
                    border-radius: 25px;
                    border: 0px;
                    background:#383838;
                    color:white;
                }

                .b1:hover{
                    height:50px;
                    width:300px;
                    font-size: 20px;
                    border-radius: 25px;
                    border: 0px;
                    background:rgba(255,255,255,1);
                    color:black;
                }

                .brand{
                    display:flex;
                    justify-content:space-around;
                }

                h1{
                    color:white;
                }

                h3{
                    color:white;
                    font-size:16px;
                }
            </style>
            
    </head>
    <body>
        <div>
            <?php include "cus_header(log in).php"?>
        </div>
    <h1 align="center">Total Points: <?php 
              include "conn.php";
              $name= $_SESSION['mySession'];
              $query ="SELECT * FROM registered_customer WHERE customer_password = '$name'";
              $result=mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($result)) {
                echo $row['point'];}
              ?> </h1>
    <form action="cus_redeem.php" method="POST" align="center">
    <div class="brand">
        <div>
        <div class="box"> 
           <img src="grab.png" width="160" height="120">
        </div><h3>Grab RM10 voucher</h3><br>
        <button class="b1" onClick="myFunction()">Redeem gift card</button></div>
        <div>
        <div class="box"> 
           <img src="KFC.jpg" width="160" height="120">
        </div><h3>KFC RM10 voucher</h3><br>
        <button class="b1" onClick="myFunction()">Redeem gift card</button></div><div>
        <div class="box"> 
           <img src="tng.jpg" width="160" height="120">
        </div><h3>TnG Ewallet RM10 voucher</h3><br>
        <button class="b1" onClick="myFunction()">Redeem gift card</button></div>
    </div><br><br><br>
    <div class="brand">
        <div>
        <div class="box"> 
           <img src="foodpanda.png" width="160" height="120">
        </div><h3>FoodPanda RM10 voucher</h3><br>
        <button class="b1" onClick="myFunction()">Redeem gift card</button></div>
        <div>
        <div class="box"> 
           <img src="McD.png" width="160" height="120">
        </div><h3>McDonald's RM10 voucher</h3><br>
        <button class="b1" onClick="myFunction()">Redeem gift card</button></div><div>
        <div class="box"> 
           <img src="PizzaHut.png" width="160" height="120">
        </div><h3>Pizza Hut RM10 voucher</h3><br>
        <button class="b1" onClick="myFunction()">Redeem gift card</button></div>
    </div>
    </form>
