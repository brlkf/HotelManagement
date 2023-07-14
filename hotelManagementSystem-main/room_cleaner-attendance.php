<!DOCTYPE html>
    <html lang = "en">
    <?php
        include "recep-session.php"
    ?>
        <head>
            <meta charset="UCF-8">
            <meta name="viewport" content=" width=device width, initial-scale=1.0">
            <title> Attendance </title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script type="text/javascript" src="action.js"></script>
            <style>

                *{
                    margin: 0px;
                    padding:0px;
                    box-sizing:border-box; 
                            
                    }
                .top-navi{
                    justify-content: space-between;
                    align-items: center;
                    height:50px;
                    background-color:#112d32;
                    margin:0;
                   
                    top:0;
                    left: 0;
                    display:flex;
                    width:100%;
                }

                .top-navi-links{
                    display:flex;
                    justify-content:space-around;
                    width: 200px;
                }

                .top-navi-links li{
                    list-style:none;
                    margin-left:50px;
                    color:white;
                }

                .top-navi-heading{
                    color:white;
                    font-size:20px;
                    text-transform: uppercase;
                    letter-spacing: 5px;
                    font-family: "fantasy";
                    padding-left:20px;


                }

                .top_navi_sec{
                    display:inline-flex;
                    padding-left:20px
                    
                }

              
                
                .content{
                    padding-top:20px;
                    display:flex;
                    justify-content: center;
                    align-items: center;
                
                }
                .button_content{
                    padding-top:50px;
                    padding-bottom:50px;
                    display:flex;
                    justify-content: center;
                    align-items: center;
                
                }
                .attendance_content{
                    padding-top:20px;
                    display:flex;
                    justify-content: center;
                    align-items: center;
                
                }
                .attendance_table {
                    font-family: Arial, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 80%;
                    text-align:center
                    }

                .attendance_table th{
                    border: 1px solid #ddd;
                    padding: 8px;
                    background-color: rgb(0,49,83);
                    color: white;
                    }
                
                .attendance_table td{
                border: 1px solid #ddd;
                padding: 8px;
                }

                .attendance_table tr:nth-child(even){
                    background-color: #f2f2f2;
                }

                .attendance_table tr:hover {
                    background-color: #ddd;
                }
                
                .sign-in-button {
                   
                   border-radius: 20px;
                   background-color: darkgrey;
                   border: none;
                 
                   text-align: center;
                   font-size: 20px;
                   padding: 20px;
                   width: 280px;
                   transition: all 0.5s;
                   cursor: pointer;
                   margin: 5px;
                   margin-left:50px;
                   margin-top:50px;
                  
                   
                   
                   }
                
                   .sign-out-button {
                   
                   border-radius: 20px;
                   background-color: darkgrey;
                   border: none;
                  
                   text-align: center;
                   font-size: 20px;
                   padding: 20px;
                   width: 280px;
                   transition: all 0.5s;
                   cursor: pointer;
                   margin: 5px;
                   margin-top:50px;
                   margin-left:50px;
                   
                   
                   }
                }
                
            </style>
        </head> 

        <body style="background-color:rgb(220,220,220)";>
            <div class = "top-navi">
             <div class = "top_navi_sec">
             <a href="room_cleaner_home.php">
                    <i class="fa fa-angle-left" style="font-size:24px;color:white"></i>
                </a>
                    <h2 class="top-navi-heading"> Attendance Record </h2>
                </div>
            
            </div>
            <div class = "attendance_page_content">
            <div class = "button_content">
            </a>
            <a href="recep-update-attendance.php">
            <div class =sign-in-button>
                    <a class="attendancebutton" href="recep-update-attendance.php"> SIGN  &nbsp; IN</a>
                    </div>
                    <div class = sign-out-button>
                    <a class="attendancebutton" href="recep-update-attendance.php"> SIGN  &nbsp; OUT </a>
                    </div>
            </a>
            </div>
            
            <div class = "attendance_content">
                <table class= "attendance_table" > 
                    <tr>
                        <th> <font face="Arial">Attendance ID</font> </th> 
                        <th> <font face="Arial">Date</font> </th> 
                        <th> <font face="Arial">In Time</font> </th> 
                        <th> <font face="Arial">Out Time</font> </th> 
                        <th> <font face="Arial">Working TIme (hours)</font></th>
                    </tr>
                   
                        <?php
                        $employee_id = $_SESSION['mySession'];
                        include "conn.php";
                        $query= "SELECT * FROM attendance WHERE employee_id = $employee_id";
                        $search_result=mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($search_result)){
                            echo "<tr>";
                            echo "<td>";
                            echo $row['attendance_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['work_date'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['sign_in_time'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['sign_out_time'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['working_time'];
                            echo "</td>";
                             }
                            mysqli_close($conn); //to close the database connection
                ?>
            </table>
        </div>
        </div>
            
        </body>
    </html>