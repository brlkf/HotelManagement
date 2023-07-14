<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UCF-8">
        <meta name="viewport" content=" width=device width, initial-scale=1.0">
        <title> Hotel Payment </title>
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
                    <h2 class="table_tittle"> Feedback Details </h2>
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
                        <option value = "feedback_id" name = "feedback_id">Feedback ID</option>
                        <option value = "customer_id" name = "customer_id">Customer ID</option>
                        <option value = "customer_name" name = "customer_name">Customer Name</option>
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
                            if($filter_option  == "feedback_id"){
                                $query="SELECT * FROM feedback INNER JOIN registered_customer on feedback.customer_id = registered_customer.customer_id WHERE feedback_id LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            
                            else if( $filter_option  == "customer_id"){
                                $query="SELECT * FROM feedback INNER JOIN registered_customer on feedback.customer_id = registered_customer.customer_id WHERE feedback.customer_id LIKE '$filter_text' 
                                AND registered_customer.customer_id LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "customer_name"){
                                $query="SELECT * FROM feedback INNER JOIN registered_customer on feedback.customer_id = registered_customer.customer_id WHERE customer_name LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "notspecific" and $filter_text ==""){
                                $query="SELECT * FROM feedback INNER JOIN registered_customer on feedback.customer_id = registered_customer.customer_id";
                                $search_result = filterTable($query);
                            }
                            else{
                                $query="SELECT * FROM feedback INNER JOIN registered_customer on feedback.customer_id = registered_customer.customer_id WHERE feedback_id LIKE '$filter_text' OR 
                                registered_customer.customer_id LIKE '$filter_text' OR customer_name LIKE '$filter_text'";
                                
                                $search_result = filterTable($query);
                            }
                        }
                        else{
                            $query="SELECT * FROM feedback INNER JOIN registered_customer on feedback.customer_id = registered_customer.customer_id";
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
                        <th> <font face="Arial">FeedBack ID</font> </th> 
                        <th> <font face="Arial">Customer ID</font> </th> 
                        <th> <font face="Arial">Customer Name</font> </th> 
                        <th> <font face="Arial">Content</font> </th> 
                        <th> <font face="Arial">Action</font> </th> 
                    </tr>
                   
                        <?php
                        while($row = mysqli_fetch_array($search_result)){
                            echo "<tr>";
                            echo "<td>";
                            echo $row['feedback_id'];
                            echo "</td>";
                            echo"<td>";
                            echo $row['customer_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['customer_name'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['details'];
                            echo "</td>";
                           echo "<td><a style='background-color:rgb(254,39,18);border-radius:8px;
                           color: black;padding:5px 10px;
                           border: 2px solid #e7e7e7;text-decoration: none;' href=\"recep-delete-feedback.php?id="; //hyperlink to delete.php page with ‘id’ parameter
                           echo $row['feedback_id'];
                           echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                           echo $row['feedback_id'];
                           echo " details?');\">Delete</a></button></td></form></tr>"; }
                            mysqli_close($conn); //to close the database connection
                ?>
                </div>
            </div>
        </div>
    </body>
</html>