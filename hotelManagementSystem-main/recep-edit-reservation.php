<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UCF-8">
        <meta name="viewport" content=" width=device width, initial-scale=1.0">
        <title> Hotel reservation </title>
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

                .reservation_content{
                    padding-top:20px;
                    display:flex;
                    justify-content: center;
                    align-items: center;
                
                }
                .reservation_table {
                    font-family: Arial, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 80%;
                    text-align:center
                    }

                    .reservation_table th{
                    border: 1px solid #ddd;
                    padding: 8px;
                    background-color: rgb(0,49,83);
                    color: white
                    }
                
                .reservation_table td{
                border: 1px solid #ddd;
                padding: 8px;
                }

                .reservation_table tr:nth-child(even){
                    background-color: white;
                }
                .reservation_table tr:nth-child(odd){
                    background-color: rgb(240,248,255);
                }

                .reservation_table tr:hover {
                    background-color: rgb(240,248,255);
                }


                .table_content{
                    justify-content: space-between;
                    align-items: center;
                    height:100px;
                    background-color: white;
                   display:flex;
                   width:100%;
                   padding-right:50px;   
                border-radius: 12px;
                }

                .table_tittle{
                    color:black;
                    font-size:20px;
                    text-transform: uppercase;
                    letter-spacing: 5px;
                    font-family: "fantasy";
                    padding-left:50px;


                }

                .filter_part{
                    align-items: center;
                    height:100px;
                    background-color:white;
                   display:flex;
                   width:100%;
                   padding-right:20px;
                   padding-left:50px;
                   border-radius: 12px;
                }

                .filter_part_sec{
                    padding-left:10px;
                }
                .filterResultBtn{
                padding: 12px 30px;
                }

            .filter_part input{
                padding: 12px 30px;
            }
            .filter_part select{
                padding: 12px 30px;
            }
            .page_content{
                padding-top:20px;
                padding-left:30px;
                padding-right:30px;
               
            }
            
            </style>
    </head>
    <body style="background-color:rgb(220,220,220)";>
        <?php
            include "recep-sidenavi.php"
        ?>
        <div id = "content-text" class="content-text">
            <?php
                include "recep-topnavi.php";
            ?>
            <div class = page_content>
            <div class = "table_content">
                <div class = "table_content_sec">
                    <h2 class="table_tittle"> Reservation Details </h2>
                </div>
               
            </div>
        </div>
        <div class = page_content>
            
                <div class = "reservation_content">
            
                <table class= "reservation_table" > 
                    <tr>
                        <th> <font face="Arial">Booking ID</font> </th> 
                        <th> <font face="Arial">Room ID</font> </th> 
                        <th> <font face="Arial">Customer ID</font> </th> 
                        <th> <font face="Arial">Customer Name</font> </th> 
                        <th> <font face="Arial">Check-in Date</font> </th> 
                        <th> <font face="Arial">Check-out Date </font> </th> 
                        <th> <font face="Arial">Check-in Time</font> </th> 
                        <th> <font face="Arial">Check-out Time</font> </th> 
                        <th> <font face="Arial">Status</font> </th> 
                        <th colspan="2"> <font face="Arial">Action</font> </th>  
                    </tr>
                   
                        <?php
                        include "conn.php";
                        $id =$_GET['id'];
                        $query="SELECT * FROM booking INNER JOIN booking_cart on booking.booking_id = booking_cart.booking_id
                            INNER JOIN registered_customer on booking_cart.customer_id = registered_customer.customer_id";
                        $result=mysqli_query($conn,$query);
                        
                        while($row = mysqli_fetch_array($result)){
                           
                            ?> 
                            <form action = 'recep-update-edited-reservation.php' method = 'post'>
                            <input type="hidden" name="booking_id" id= "booking_id" value="<?php echo $_GET['id'] ?>"></input>
                            <?php
                            if ($row['booking_id'] == $id){
                                
                                
                                echo "<tr>";
                                echo "<td>";
                                echo $row['booking_id'];
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='text' name = 'room_id' id= 'room_id' size='5' value='";
                                echo $row['room_id'];
                                echo "'>";
                                echo "</input>";
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='text' name = 'customer_id' id= 'customer_id' size='5' value='";
                                echo $row['customer_id'];
                                echo "'>";
                                echo "</input>";
                                echo "</td>";
                                echo "<td>";
                                echo $row['customer_name'];
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='date' name = 'booking_start_date' id= 'booking_start_date' size='5' value='";
                                echo $row['booking_start_date'];
                                echo "'>";
                                echo "</input>";
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='date' name = 'booking_end_date' id= 'booking_end_date' size='5' value='";
                                echo $row['booking_end_date'];
                                echo "'>";
                                echo "</input>";
                                echo "</td>";
                                if ($row['booking_start_time']== 0)
                                {
                                    echo "<td><a style='background-color:rgb(49,140,231);border-radius:8px;
                                    color: black;padding:5px 10px;
                                    border: 2px solid #e7e7e7;text-decoration: none;'href=\"recep-update-reservation.php?id="; //edit.php will be created in Lab 8
                                    echo $row['booking_id'];
                                    echo "\">Confirm</a></td>";
                                }    
                                else{
                                    echo "<td>";
                                    echo "<input type='datetime' name = 'booking_start_time' id= 'booking_start_time' size='5' value='";
                                    echo $row['booking_start_time'];
                                    echo "'>";
                                    echo "</input>";
                                    echo "</td>";
                                };
                                if ($row['booking_end_time']== 0)
                                {
                                    echo "<td><a style='background-color:rgb(49,140,231);border-radius:8px;
                                    color: black;padding:5px 10px;
                                    border: 2px solid #e7e7e7;text-decoration: none;'href=\"recep-update-reservation2.php?id="; //edit.php will be created in Lab 8
                                    echo $row['booking_id'];
                                    echo "\">Confirm</a></td>";
                                }
                                
                                else{
                                    echo "<td>";
                                    echo "<input type='datetime' name = 'booking_end_time' id= 'booking_end_time' size='5' value='";
                                    echo $row['booking_end_time'];
                                    echo "'>";
                                    echo "</input>";
                                    echo "</td>";
                                };
                                echo "<td>";
                                echo "<input type='text' name = 'booking_status' id= 'booking_status' size='5' value='";
                                echo $row['booking_status'];
                                echo "'>";
                                echo "</input>";
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='submit' value = 'Update' name = 'update' id= 'update' style='background-color:rgb(255,117,24);border-radius:8px;
                                color: black;padding:5px 10px;
                                border: 2px solid #e7e7e7;text-decoration: none;
                                border: 2px solid #e7e7e7;cursor: pointer;'";
                                echo ">";
                                echo "</input>";
                                echo "</td>";
                                echo "<td><a style='background-color:rgb(153,85,187);border-radius:8px;
                                color: black;padding:5px 10px;
                                border: 2px solid #e7e7e7;text-decoration: none;' href=\"recep-reservation.php?id="; //hyperlink to delete.php page with ‘id’ parameter
                                echo $row['booking_id'];
                                echo "\" onClick=\"return confirm('Cancel editing reservation details for "; //JavaScript to confirm the deletion of the record
                                echo $row['booking_id'];
                                echo " details?');\">Cancel</a></button></td></tr>"; 
                                echo "</form>";
                             
                            }
                            else{
                                echo "<tr>";
                                echo "<td>";
                                echo $row['booking_id'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['room_id'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['customer_id'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['customer_name'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['booking_start_date'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['booking_end_date'];
                                echo "</td>";
                                if ($row['booking_start_time']== 0)
                                {
                                    echo "<td><a style='background-color:rgb(49,140,231);border-radius:8px;
                                    color: black;padding:5px 10px;
                                    border: 2px solid #e7e7e7;text-decoration: none;'href=\"recep-update-reservation.php?id="; //edit.php will be created in Lab 8
                                    echo $row['booking_id'];
                                    echo "\">Confirm</a></td>";
                                }
                            
                                else{
                                    echo "<td>";
                                    echo $row['booking_start_time'];
                                    echo "</td>";
                                };
                                if ($row['booking_end_time']== 0)
                                {
                                    echo "<td><a style='background-color:rgb(49,140,231);border-radius:8px;
                                    color: black;padding:5px 10px;
                                    border: 2px solid #e7e7e7;text-decoration: none;'href=\"recep-update-reservation2.php?id="; //edit.php will be created in Lab 8
                                    echo $row['booking_id'];
                                    echo "\">Confirm</a></td>";
                                }
                                
                                else{
                                    echo "<td>";
                                    echo $row['booking_end_time'];
                                    echo "</td>";
                                };
                                echo "<td>";
                                echo $row['booking_status'];
                                echo "</td>";
                                echo "<td><a  style='background-color:rgb(3,192,60);border-radius:8px;
                                color: black;padding:5px 10px;
                                border: 2px solid #e7e7e7;text-decoration: none;' href=\"recep-edit-reservation.php?id="; //edit.php will be created in Lab 8
                                echo $row['booking_id'];
                                echo "\">Edit</a></td>";
                                echo "<td><a  style='background-color:rgb(254,39,18);border-radius:8px;
                                color: black;padding:5px 10px;
                                border: 2px solid #e7e7e7;text-decoration: none;' href=\"delete.php?id="; //hyperlink to delete.php page with ‘id’ parameter
                                echo $row['booking_id'];
                                echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                                echo $row['booking_id'];
                                echo " details?');\">Delete</a></button></td></form></tr>"; 
                               //to close the database connection
                                } 
                                
                        }
                            
                ?>
            </div>
        </div>
     </div>
    </body>
</html>