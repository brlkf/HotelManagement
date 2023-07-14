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
                    <h3>Duration</h3>
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
                echo floor($duration/60/1440);
                echo "&nbspdays";
                echo "</h3>";?>
                </th>
            </tr>
            <tr>
                <th>
                    <h3>Price Per Day</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th>
                <?php  
                if ($type=="single"){
                    echo "<h3>";
                    echo 600;
                    echo "</h3>";
                    }
                    else if ($type=="double") {
                        echo "<h3>";
                    echo 800;
                    echo "</h3>";
                    }
                    else if ($type=="master") {
                        echo "<h3>";
                    echo 1000;
                    echo "</h3>";}?>
            
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

            <?php
    include("conn.php");
    $sd = $_POST['booking_start_date'];
    $ed = $_POST['booking_end_date'];
    $roomtype = $_POST['room_option'];
    $allroom = array();
    $bookedroomcart = array();
    $matchedtyperoom =array();
    $query = "SELECT * FROM booking ;";   
    $finding_result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($finding_result)){
        $bsd =$row['booking_start_date'];
        $bed =$row['booking_end_date'];
        if (($sd >= $bsd && $sd <= $bed)||($ed >= $bsd && $ed <= $bed))   
                {array_push($bookedroomcart,$row['room_id'] );}
            }
    $query1 = "SELECT * FROM room ;";
    $result1 = mysqli_query($conn,$query1);
    while($row=mysqli_fetch_array($result1)){
        
            array_push($allroom,$row['room_id'] );
        }
    $combinedtypeandbooked =array_merge($allroom,$bookedroomcart);
    $allavailableroom = array_diff($combinedtypeandbooked, array_diff_assoc($combinedtypeandbooked, array_unique($combinedtypeandbooked)));
    $query2 = "SELECT * FROM room ;";
    $result2 = mysqli_query($conn,$query2);
    while($row=mysqli_fetch_array($result2)){
        if ($row['room_type'] == $roomtype){
            array_push($matchedtyperoom,$row['room_id']);
        }
                
        } 
        $finalmatchedroom = array_intersect($allavailableroom,$matchedtyperoom);
        foreach ($finalmatchedroom as $canbookroom) {
            
        }if ($canbookroom != ""){
            echo $canbookroom . '<br>';}
            else {
                echo '<script>alert("No available room!");window.location.href="cus_home(log in).php";
                        </script>';
            }
?></th>
        </table><br><br>
        <div align="center">
                <form action="cus_confirm.php" method="POST">
                    <input name="booking_start_date" type="hidden" value=<?php echo $_POST['booking_start_date']?>> 
                    <input name="booking_end_date" type="hidden" value=<?php echo $_POST['booking_end_date']?>>
                    <input name="room_option" type="hidden" value=<?php echo $_POST['room_option']?>>
                    <input name="room_id" type="hidden" value=<?php
    include("conn.php");
    $sd = $_POST['booking_start_date'];
    $ed = $_POST['booking_end_date'];
    $roomtype = $_POST['room_option'];
    $allroom = array();
    $bookedroomcart = array();
    $matchedtyperoom =array();
    $query = "SELECT * FROM booking ;";   
    $finding_result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($finding_result)){
        $bsd =$row['booking_start_date'];
        $bed =$row['booking_end_date'];
        if (($sd >= $bsd && $sd <= $bed)||($ed >= $bsd && $ed <= $bed))   
                {array_push($bookedroomcart,$row['room_id'] );}
            }
    $query1 = "SELECT * FROM room ;";
    $result1 = mysqli_query($conn,$query1);
    while($row=mysqli_fetch_array($result1)){
        
            array_push($allroom,$row['room_id'] );
        }
    $combinedtypeandbooked =array_merge($allroom,$bookedroomcart);
    $allavailableroom = array_diff($combinedtypeandbooked, array_diff_assoc($combinedtypeandbooked, array_unique($combinedtypeandbooked)));
    $query2 = "SELECT * FROM room ;";
    $result2 = mysqli_query($conn,$query2);
    while($row=mysqli_fetch_array($result2)){
        if ($row['room_type'] == $roomtype){
            array_push($matchedtyperoom,$row['room_id']);
        }
                
        } 
        $finalmatchedroom = array_intersect($allavailableroom,$matchedtyperoom);
        foreach ($finalmatchedroom as $canbookroom) {
            
        }echo $canbookroom . '<br>';?>>
                    <button class="b1">Confirm Booking</button></form></div>
                </form>
</body>


</html>


