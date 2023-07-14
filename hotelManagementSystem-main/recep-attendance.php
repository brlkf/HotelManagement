<!DOCTYPE html>
<html lang = "en">
    <?php
    include "recep-session.php"
    ?>
    <head>
        <meta charset="UCF-8">
        <meta name="viewport" content=" width=device width, initial-scale=1.0">
        <title> Personal Attendance Record</title>
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
                    <h2 class="table_tittle"> Personal Attendance Record </h2>
                </div>
            </div>
        </div>
            
        <div class = page_content>     
        
                <div class = "reservation_content">
            
                <table class= "reservation_table" > 
                <tr>
                        <th> <font face="Arial">Attendance ID</font> </th> 
                        <th> <font face="Arial">Date</font> </th> 
                        <th> <font face="Arial">In Time</font> </th> 
                        <th> <font face="Arial">Out Time</font> </th> 
                    </tr>>
                   
                        <?php
                        include "conn.php";
                        $employee_id = $_SESSION['mySession'];
                        $query="SELECT * FROM attendance  where employee_id = $employee_id
                            ";
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
                             }
                            mysqli_close($conn); //to close the database connection
                ?>
                </table>
            </div>
        </div>
        </div>
        </body>
    </html>

