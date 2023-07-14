<!DOCTYPE html>
<html>
    <?php include "cus_session.php"?>
    <head>
        <title>Menu</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <style>body{
                margin:0;
                background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),
                url("Hotel2.png");
                background-repeat: no-repeat;
                background-size: 1600px 800px;}
                .table{
        table-layout:fixed;
        border-collapse: collapse;
        font-size: 0.9em;
        font-family: sans-serif;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border-radius: 25px;
        overflow: hidden; 
        align: center;
        width: 60%;
    }
    
    .table thead tr{
        height:200px;
    background-color: rgba(56, 56, 56, 0.66);
    
    text-align: left;
    }

    .table thead tr th{
        text-align:center;
        color:white;
    }


    .table tbody tr{
        border-bottom: 1px solid #dddddd;
    }
    .table tbody tr:nth-of-type(odd){
    background-color: white; 
    }
    .table tbody tr:nth-of-type(even){
    background-color: #f3f3f3; 
    }


    .view_ticket{
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
        transition: 5s;
        box-shadow: inset 0 0 0 0;
    }

    .view_ticket:hover{
        box-shadow: inset 400px 0 0 0 #2691d9;
    }
    
    i{
        color:red;
        font-size:20px
    }
    .wordalign{
        display:flex;
        margin-left:540px
    }

    .b1{
        height:30px;
        width:80px;
        font-size: 20px;
        border-radius: 25px;
        border: 0px;
        background:#383838;
        color:white;
    }

    .b1:hover{
        height:30px;
        width:80px;
        font-size: 20px;
        border-radius: 25px;
        border: 0px;
        background:rgba(255,255,255,1);
        color:black;
    }

    </style>
    <title>document</title>
</head>
<body>
    <?php
    include "cus_header(log in).php" 
    ?><br><br> <br>  
    <table class = table align = center>
        <thead>
          <tr><th class="left">
                    <h3>Booking ID</h3>
                </th>
                <th>
                    <h3>Booking Start Date</h3>
                </th>
                <th class="left">
                    <h3>Booking End Date</h3>
                </th>
                <th>
                    <h3>Room ID</h3>
                </th>
                <th class="left">
                    <h3>Room Type</h3>
                </th>
                <th class="left">
                    <h3>Price(RM)</h3>
                </th>
                <th class="left">
                    <h3>Feedback</h3>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php 
              include "conn.php";
              $name= $_SESSION['mySession'];
              $query ="SELECT * FROM registered_customer 
              INNER JOIN booking_cart ON registered_customer.customer_id = booking_cart.customer_id
              INNER JOIN booking ON booking.booking_id = booking_cart.booking_id
              INNER JOIN room ON booking.room_id = room.room_id
              INNER JOIN payment ON booking_cart.booking_cart_id = payment.booking_cart_id
              WHERE registered_customer.customer_password = '$name'" ;
              $result=mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($result)) {
               
              ?> 
            <tr>
                <th class="left">
                    <h3><?php echo $row['booking_id'];?></h3>
                </th>
                <th class="left">
                    <h3><?php echo $row['booking_start_date'];?></h3>
                </th>
                <th class="left">
                    <h3><?php echo $row['booking_end_date'];?></h3>
                </th>
                <th class="left">
                    <h3><?php echo $row['room_id'];?></h3>
                </th>
                <th class="left">
                    <h3><?php echo $row['room_type'] ;?></h3>
                </th>
                <th class="left">
                    <h3><?php echo $row['amount'] ;?></h3>
                </th>
                <th>
                    <button class="b1" onclick="location.href='cus_feedback.php'">Add</button>
                </th>
                <?php } ?>
        </table><br><br><div align="center">
        </div>
</body>
</html>       
