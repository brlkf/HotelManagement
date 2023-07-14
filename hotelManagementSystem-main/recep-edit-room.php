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
                    <h2 class="table_tittle"> Room Details </h2>
                </div>
               
            </div>
        </div>
        <div class = page_content>
            
                <div class = "reservation_content">
            
                <table class= "reservation_table" > 
                    <tr>
                    <th> <font face="Arial">Room ID</font> </th> 
                        <th> <font face="Arial">Room Type</font> </th> 
                        <th> <font face="Arial">Price(Per Night)</font> </th> 
                        <th> <font face="Arial">Room Availability</font> </th> 
                        <th> <font face="Arial">Room Status</font> </th> 
                        <th colspan="2"> <font face="Arial">Action</font> </th>  
                    </tr>
                   
                        <?php
                        include "conn.php";
                        $id =$_GET['id'];
                        $query="SELECT * FROM room";
                        $result=mysqli_query($conn,$query);
                        
                        while($row = mysqli_fetch_array($result)){
                           
                            ?> 
                            <form action = 'recep-update-edited-room.php' method = 'post'>
                            <input type="hidden" name="room_id" id= "room_id" value="<?php echo $_GET['id'] ?>"></input>
                            <?php
                            if ($row['room_id'] == $id){
                                
                                
                                echo "<tr>";
                                echo "<td>";
                                echo $row['room_id'];
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='text' name = 'room_type' id= 'room_type' size='5' value='";
                                echo $row['room_type'];
                                echo "'>";
                                echo "</input>";
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='text' name = 'price_per_night' id= 'price_per_night' size='5' value='";
                                echo $row['price_per_night'];
                                echo "'>";
                                echo "</input>";
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='text' name = 'room_availability' id= 'room_availability' size='5' value='";
                                echo $row['room_availability'];
                                echo "'>";
                                echo "</input>";
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='text' name = 'room_status' id= 'room_status' size='5' value='";
                                echo $row['room_status'];
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
                                border: 2px solid #e7e7e7;text-decoration: none;' href=\"recep-room.php?id="; //hyperlink to delete.php page with ‘id’ parameter
                                echo $row['room_id'];
                                echo "\" onClick=\"return confirm('Cancel editing reservation details for "; //JavaScript to confirm the deletion of the record
                                echo $row['room_id'];
                                echo " details?');\">Cancel</a></button></td></tr>"; 
                                echo "</form>";
                             
                            }
                            else{
                                echo "<tr>";
                                echo "<td>";
                                echo $row['room_id'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['room_type'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['price_per_night'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['room_availability'];
                                echo "</td>";
                                echo "<td>";
                                echo $row['room_status'];
                                echo "</td>";
                               
                                echo "<td><a  style='background-color:rgb(3,192,60);border-radius:8px;
                                color: black;padding:5px 10px;
                                border: 2px solid #e7e7e7;text-decoration: none;' href=\"recep-edit-room.php?id="; //edit.php will be created in Lab 8
                                echo $row['room_id'];
                                echo "\">Edit</a></td>";
                                echo "<td><a  style='background-color:rgb(254,39,18);border-radius:8px;
                                color: black;padding:5px 10px;
                                border: 2px solid #e7e7e7;text-decoration: none;' href=\"recep-delete-room.php?id="; //hyperlink to delete.php page with ‘id’ parameter
                                echo $row['room_id'];
                                echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                                echo $row['room_id'];
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