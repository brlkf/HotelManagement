<!DOCTYPE html>
<html>
<head>
<?php include "cus_session.php"?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link  rel="stylesheet">
    <style>
        body{
                margin:0;
                background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),
                url("Hotel2.png");
                background-repeat: no-repeat;
                background-size: 1600px 800px;
            }

    h2,h3{
        font-family:Times New Roman;
        font-size:16px;
        color:black;
    }

    .table{
        table-layout:fixed;
        border-collapse: collapse;
        font-size: 0.9em;
        font-family: sans-serif;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border-radius: 25px;
        overflow: hidden; 
        align: center;
        width: 45%;
    }
    
    .table thead tr{
        height:250px;
    background-color: #383838;
    
    text-align: left;
    }

    .table th{
        align:center;

    }

    .payment-container{
            position:absolute;
            justify-content: center;
            width: 750px;
            height: 500px;
            background-color: #dddddd;
            border-radius: 10px;
            padding: 40px;
            align-items: center;
            margin-left:25%;
            margin-top:75px;
            display:none    ;
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

    input[type=text], [type=password],select{
            margin-bottom: 15px;
            max-width: 300px;
        }

        input {
            width: 100%;
            padding: 9px;
            border: 1px solid #dddddd;
            font-size: 12px;
            border-radius: 4px;
            box-sizing: border-box;
            display: block;
            margin-bottom: 15px;
        }

        .height{
        height:100px;
    }
    </style>
    <title>document</title>
</head>
<body>
    <div class="height"></div>
    <table class = table align = center>
        <thead>
          <tr><td  colspan="3" align="center">
              <?php 
              $type=$_POST['room_option'];
                if ($type=="single"){
                $room_type = "singleroom.jpg";
                }
                else if ($type=="double") {
                    $room_type = "doubleroom.jpg";
                }
                else if ($type=="master") {
                    $room_type = "masterroom.png";
                }
                $data='<div><img src="'.$room_type.'" width="300"></div>';
                echo $data; 
                 
              ?>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    <h3>Room Type</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th>
            <?php
            $type=$_POST['room_option'];
            echo "<h3>";
            echo $type;
            echo "</h3>"
            ?>
            </th>
            </tr>
            <tr>
                <th>
                    <h3>Start Date</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th>
            <?php
            $sd=$_POST['booking_start_date'];
            $ed=$_POST['booking_end_date'];
            if ($sd>$ed){
                echo '<script>alert("Start Date Must Be Earlier than End Date");window.history.back();</script>'; 
            }
            else{
            echo "<h3>";
            echo $sd;
            echo "</h3>";}
            
            ?>
            </th>
            <tr>
                <th>
                    <h3>End Date</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th>
                <?php
                    $ed=$_POST['booking_end_date'];
                    echo "<h3>";
                    echo $ed;
                    echo "</h3>";
                ?>
                </th>
            </tr>
            <tr>
                <th>
                    <h3>Total Price</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th>
                <?php  
                $sd=strtotime($_POST['booking_start_date']);
                $ed=strtotime($_POST['booking_end_date']);
                $duration=$ed-$sd;
                echo "<h3>";
                $duration=floor($duration/60/1440);
                echo $duration;
                echo "&nbspdays";
                echo "&nbsp*&nbsp";
                $total="";
                if ($type=="single"){
                    echo 600;
                    echo "&nbsp=&nbsp";
                    $total=600*$duration;
                    echo $total;
                    echo "</h3>";
                    }
                    else if ($type=="double") {
                    echo 800;
                    echo "&nbsp=&nbsp RM";
                    $total=800*$duration;
                    echo $total;
                    echo "</h3>";
                    }
                    else if ($type=="master") {
                    echo 1000;
                    echo "&nbsp=&nbsp RM";
                    $total=1000*$duration;
                    echo $total;
                    echo "</h3>";}
                    ?>
                </th>
            </tr>
            <tr>
                <th>
                    <h3>Room ID</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th>

            <?php echo $_POST['room_id'];
?></th>
        </table><br><br>
        <div align="center">
        <form action="cus_add_booking.php" method="POST">
                    <input name="booking_start_date" type="hidden" value=<?php echo $_POST['booking_start_date']?>> 
                    <input name="booking_end_date" type="hidden" value=<?php echo $_POST['booking_end_date']?>>
                    <input name="room_option" type="hidden" value=<?php echo $_POST['room_option']?>>
                    <input name="room_id" type="hidden" value=<?php echo $_POST['room_id']?>>
                    <input name="total" type="hidden" value=<?php if ($type=="single"){;
                    echo $total;
                    }
                    else if ($type=="double") {
                    echo $total;
                    }
                    else if ($type=="master") {
                    echo $total;}?>>
                    <button class="b1">Make Payment</button></form></div>
                </form>
</body></div>

        </body>

 