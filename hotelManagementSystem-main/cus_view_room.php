<!DOCTYPE html>
<html>
<head>
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
    </style>
    <title>document</title>
</head>
<body>
    <?php
    include "header.php" 
    ?>   
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
            $sd=$_POST['start_date'];
            $ed=$_POST['end_date'];
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
                    $ed=$_POST['end_date'];
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
                $sd=strtotime($_POST['start_date']);
                $ed=strtotime($_POST['end_date']);
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
        </table><br><br>
        <div align="center">
                <form action="cus_find_room.php" method="POST">
                    <input name="booking_start_date" type="hidden" value=<?php echo $_POST['start_date']?>> 
                    <input name="booking_end_date" type="hidden" value=<?php echo $_POST['end_date']?>>
                    <input name="room_option" type="hidden" value=<?php echo $_POST['room_option']?>>
                    <button class="b1">Find Room</button></form></div>
                </form>
</body>
</html>