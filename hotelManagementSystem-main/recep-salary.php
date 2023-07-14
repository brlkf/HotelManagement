<!DOCTYPE html>
<html lang = "en">
    <?php
    include "recep-session.php"
    ?>
    <head>
        <meta charset="UCF-8">
        <meta name="viewport" content=" width=device width, initial-scale=1.0">
        <title> Personal Salary</title>
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
                    <h2 class="table_tittle"> Personal Monthly Salary Details </h2>
                </div>
            </div>
        </div>
            
        <div class = page_content>     
        
                <div class = "reservation_content">
            
                <table class= "reservation_table" > 
                    <tr>
                        <th> <font face="Arial">Month</font> </th> 
                        <th> <font face="Arial">Salary Amount</font> </th> 
                    </tr>
                   
                        <?php
                        include "conn.php";
                        $employee_id = $_SESSION['mySession'];
                        $query = "SELECT SUM(amount) AS total, MONTH(hand_out_date) AS monthly_salary  FROM salary WHERE employee_id = $employee_id
                        GROUP BY MONTH(hand_out_date)";
                        $result=mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                             echo "<td>";
                            echo $row['monthly_salary'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['total'];
                            echo "</td>";
                            echo "</tr>";
                           
                        }
                            mysqli_close($conn); //to close the database connection
                ?>
                </table>
            </div>
        </div>
        </div>
    </body>
</html>