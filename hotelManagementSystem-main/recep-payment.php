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
                    <h2 class="table_tittle"> Payment Details </h2>
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
                        <option value = "payment_id" name = "payment_id">Payment ID</option>
                        <option value = "booking_cart_id" name = "booking_cart_id">Booking Cart ID</option>
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
                            if($filter_option  == "payment_id"){
                                $query="SELECT * FROM payment INNER JOIN booking_cart on payment.booking_cart_id = booking_cart.booking_cart_id
                                INNER JOIN registered_customer on booking_cart.customer_id = registered_customer.customer_id WHERE payment_id LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "booking_id"){
                                $query="SELECT * FROM payment INNER JOIN booking_cart on payment.booking_cart_id = booking_cart.booking_cart_id
                                INNER JOIN registered_customer on booking_cart.customer_id = registered_customer.customer_id WHERE payment.booking_cart_id LIKE '$filter_text' AND 
                                booking_cart.booking_cart_id LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "customer_id"){
                                $query="SELECT * FROM payment INNER JOIN booking_cart on payment.booking_cart_id = booking_cart.booking_cart_id
                                INNER JOIN registered_customer on booking_cart.customer_id = registered_customer.customer_id WHERE booking_cart.customer_id LIKE '$filter_text' AND registered_customer.customer_id LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "customer_name"){
                                $query="SELECT * FROM payment INNER JOIN booking_cart on payment.booking_cart_id = booking_cart.booking_cart_id
                                INNER JOIN registered_customer on booking_cart.customer_id = registered_customer.customer_id WHERE customer_name LIKE '$filter_text'";
                                $search_result = filterTable($query);
                            }
                            else if( $filter_option  == "notspecific" and $filter_text ==""){
                                $query="SELECT * FROM payment INNER JOIN booking_cart on payment.booking_cart_id = booking_cart.booking_cart_id
                                INNER JOIN registered_customer on booking_cart.customer_id = registered_customer.customer_id";
                                $search_result = filterTable($query);
                            }
                            else{
                                $query="SELECT * FROM payment INNER JOIN booking_cart on payment.booking_cart_id = booking_cart.booking_cart_id
                                INNER JOIN registered_customer on booking_cart.customer_id = registered_customer.customer_id WHERE booking_cart.booking_cart_id LIKE '$filter_text' OR payment_id LIKE '$filter_text' OR 
                                registered_customer.customer_id LIKE '$filter_text' OR customer_name LIKE '$filter_text'";
                                
                                $search_result = filterTable($query);
                            }
                        }
                        else{
                            $query="SELECT * FROM payment INNER JOIN booking_cart on payment.booking_cart_id = booking_cart.booking_cart_id
                            INNER JOIN registered_customer on booking_cart.customer_id = registered_customer.customer_id";
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
                        <th> <font face="Arial">Payment ID</font> </th> 
                        <th> <font face="Arial">Booking Cart ID</font> </th> 
                        <th> <font face="Arial">Customer ID</font> </th> 
                        <th> <font face="Arial">Customer Name</font> </th> 
                        <th> <font face="Arial">Amount(RM)</font> </th> 
                    </tr>
                   
                        <?php
                        while($row = mysqli_fetch_array($search_result)){
                            echo "<tr>";
                            echo "<td>";
                            echo $row['payment_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['booking_cart_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['customer_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['customer_name'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['amount'];
                            echo "</td>";
                           echo "</tr>"; }
                            mysqli_close($conn); //to close the database connection
                ?>
                </div>
            </div>
        </div>
    </body>
</html>