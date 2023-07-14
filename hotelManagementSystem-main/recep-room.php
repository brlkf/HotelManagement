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
                    text-align:center;
                   
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
                border-radius: 5px;
            }
            .filter_part select{
                padding: 12px 30px;
                border-radius: 5px;
            }
            .filterResultBtn{
                border-radius: 5px;
            }

            .page_content{
                padding-top:20px;
                padding-left:30px;
                padding-right:30px;
               
            }

            .newButton{
                background-color:rgb(0,49,83);
                border-radius: 5px;
                padding:10px 25px;
                text-decoration: none;
                color:white;
            }
            </style>
    </head>
    <body style="background-color:	rgb(220,220,220)";>
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
                <div class = "table_content_sec">
                        <a class="newButton" href="recep-new-room.php">New</a>
                </div>
            </div>
        </div>
            <div class = page_content>
                <form class = "filter_part" method = "post">
                    <div class  = "filter_part_sec">
                    <input type = "text" name = "filtered_text" placeholder = "Please enter the details" ></input>
                    </div>
                    <div class = "filter_part_sec">
                    <select name = "filter_option" id = "filter_option">
                        <option value = "notspecific" name = "notspecific">Please select </option>
                        <option value = "room_id" name = "room_id">Room ID</option>
                        <option value = "room_type" name = "room_type">Room Type</option>
                        <option value = "room_availability" name = "room_availability">Room Availability</option>
                        <option value = "room_status" name = "room_status">Room Cleaning Status</option>
                    </select>
                    </div>
                    <div class = "filter_part_sec">
                        <button class="filterResultBtn" name="filterBtn" type="submit">Search</button>
                    </div>
                </form>
            <?php
                        include("conn.php");
                        if(isset($_POST['filterBtn'])){
                            $filter_text = $_POST['filtered_text'];
                            $filter_option = $_POST['filter_option'];
                            if($filter_option  == "room_id"){
                                $query="SELECT * FROM room WHERE room_id LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "room_type"){
                                $query="SELECT * FROM room WHERE room_type LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "room_availability"){
                                $query="SELECT * FROM room WHERE room_availability LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "room_status"){
                                $query="SELECT * FROM room WHERE room_status LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            
                            else if( $filter_option  == "notspecific" and $filter_text ==""){
                                $query="SELECT * FROM room";
                                $search_result = filterTable($query);
                            }
                            
                            else{
                                $query="SELECT * FROM room WHERE room_id LIKE '$filter_text' OR room_status LIKE '$filter_text' OR room_availability LIKE '$filter_text' OR
                                room_type LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                        }
                        else{
                            $query="SELECT * FROM room";
                            $search_result = filterTable($query);
                        }
                        function filterTable($query)
                        {
                            include("conn.php");
                            $filter_Result=mysqli_query($conn,$query);
                            return $filter_Result;
                        }
                        ?>
                </div>
                <div class = "page_content">
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
                        while($row = mysqli_fetch_array($search_result)){
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
                            echo "<td><a style='background-color:rgb(254,39,18);border-radius:8px;
                            color: black;padding:5px 10px;
                            border: 2px solid #e7e7e7;text-decoration: none;' href=\"recep-delete-room.php?id="; //hyperlink to delete.php page with ‘id’ parameter
                            echo $row['room_id'];
                            echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                            echo $row['room_id'];
                            echo " details?');\">Delete</a></button></td></form></tr>"; }
                            mysqli_close($conn); //to close the database connection
                ?>
                </table>
            </div>
        </div>
    </div>