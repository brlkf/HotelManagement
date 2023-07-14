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
                border-radius: 5px;
                }

                .filter_part input{
                padding: 12px 30px;
                border-radius: 5px;
            }
            .filter_part select{
                padding: 12px 30px;
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
                    <h2 class="table_tittle"> Customer Details </h2>
                </div>
                <div class = "table_content_sec">
                        <a class="newButton" href="recep-new-customer.php">New</a>
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
                        <option value = "customer_id" name = "customer_id">Customer ID</option>
                        <option value = "customer_name" name = "customer_name">Customer Name</option>
                        <option value = "customer_nationality" name = "customer_nationality">Nationality</option>
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
                            if($filter_option  == "customer_id"){
                                $query="SELECT * FROM registered_customer WHERE customer_id LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "customer_name"){
                                $query="SELECT * FROM registered_customer WHERE customer_name LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "customer_nationality"){
                                $query="SELECT * FROM registered_customer WHERE customer_nationality LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            
                            else if( $filter_option  == "notspecific" and $filter_text ==""){
                                $query="SELECT * FROM registered_customer";
                                $search_result = filterTable($query);
                            }
                            
                            else{
                                $query="SELECT * FROM registered_customer WHERE customer_id LIKE '$filter_text' OR customer_name LIKE '$filter_text' OR customer_nationality LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                        }
                        else{
                            $query="SELECT * FROM registered_customer";
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
                <div class = page_content>
                <div class = "reservation_content">
            
                <table class= "reservation_table" > 
                    <tr>
                        <th> <font face="Arial">Customer ID</font> </th> 
                        <th> <font face="Arial">Customer Name</font> </th> 
                        <th> <font face="Arial">Customer Password</font> </th> 
                        <th> <font face="Arial">Customer Nationality</font> </th> 
                        <th> <font face="Arial">Customer Contact Number</font> </th>
                        <th> <font face="Arial">Customer Email</font> </th>  
                        <th> <font face="Arial">Customer IC NO.</font> </th>
                        <th> <font face="Arial">Customer Passport NO.</font> </th> 
                        <th> <font face="Arial">Accumulated_point</font> </th>   
                    </tr>
                   
                        <?php
                        while($row = mysqli_fetch_array($search_result)){
                            echo "<tr>";
                            echo "<td>";
                            echo $row['customer_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['customer_name'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['customer_password'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['customer_nationality'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['customer_phone_no'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['customer_email'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['ic_no'];
                            echo "</td>";
                            echo "<td>";
                            if ($row['passport_no'] == 0){
                                echo "-";
                            }
                            else if ($row['passport_no']!= 0){
                                echo $row['passport_no'];
                            }
                            
                            echo "</td>";
                            echo "<td>";
                            if ($row['point'] == 0){
                                echo "-";
                            }
                            else if ($row['point']!= 0){
                                 echo $row['point'];
                            }
                           
                            echo "</td>";
                            echo "</tr>"; }
                            mysqli_close($conn); //to close the database connection
                ?>
                </table>
            </div>
        </div>
     </div>
    </body>
</html>