<!DOCTYPE html>
<html>
<?php
        include "recep-session.php"
    ?>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script type="text/javascript" src="action.js"></script>
    <style>
            *{
                    margin: 0px;
                    padding:0px;
                    box-sizing:border-box; 
                    
                            
                    }
                .content-text{
                    margin-top:0px;
                    margin-left:0px;
                    padding-bottom:50px;
                }


                #content-text{
                    transition: all .5s;
                }

    h2,h3{
        font-family:"Montserrat",sans-serif;
        font-size:20px
    }

    

    .table{
        border-collapse: collapse;
        font-size: 0.9em;
        font-family: sans-serif;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border-radius: 5px 5px 0 0;
        overflow: hidden; 
        align: center;
        width: 80%;
    }
    
    .table thead tr{
    background-color: rgb(0,49,83);
    color: white;
    text-align: left;
    }

    .table th, td{
        padding : 12px 15px;
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

    .table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
    }

    .table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

    .table_content{
        display : flex;
        justify-content: center;
        align-items: center;
        margin-top:10px;
    }

    .wordalign{
        padding : 20px;
    }
    </style>
    <title>document</title>
</head>
<body style="background-color:rgb(220,220,220)";>
    <?php 
        include "side.php";
    ?>

    <div id = "content-text" class="content-text">
        <?php 
            include "top_nevi.php";
        ?>
    
    <div class="wordalign">
        <h2>Schedule</h2>
    </div>
    <div class = table_content>
    <table  class = table align = center >
        
        <thead>
          <tr>
            <th>Room id </th>
            <th>Work start time</th>
            <th>Work end time</th>
            <th>Work date</th>
            <th>Room status</th>
            <th>Employee ID</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $employee_id = $_SESSION['mySession'];
            include "conn.php";          
            $sql="SELECT * FROM schedule INNER JOIN room on schedule.room_id = room.room_id WHERE employee_id = employee_id;";
            $result = mysqli_query($conn,$sql); 
            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
            
                echo "<td>";          
                echo $row['room_id'];
                echo "</td>";

                echo "<td>";
                echo $row['work_start_time'];
                echo "</td>";

                echo "<td>";
                echo $row['work_end_time'];
                echo "</td>";

                echo "<td>";
                echo $row['work_date'];
                echo "</td>";

                if ($row['room_status']== 0)
                            {
                                echo "<td><a href=\"update_clean_status.php?id="; 
                                echo $row['room_id'];
                                echo "\">Confirm</a></td>";
                             }
                            
                            else{
                                echo "<td>";
                                 echo "Complete";
                                 echo "</td>";
                            };
                            
                echo "<td>";
                echo $row['employee_id'];
                echo "</td>";

                echo "</tr>";
            
        }
                mysqli_close($conn);//to close the database connection
            ?>
        </tbody>
    </div>
    </table>
    </div>
    </div>
</body>
</html>