<!DOCTYPE html>
    <html lang = "en">
        <head>
            <style>
                
                .payment_form{
                   position:absolute;
                   background:red;
                   text-align:center;
                   padding-left:30px;
                   padding-right:10px;
                    left:35%;
                    top:10%;
                    background-color:rgb(0,49,83);
                    border-radius: 50px 20px;
                }

                body{
                    margin: 0;
                    padding: 0;
                    font-family: 'Open Sans',sans-serif;
                    margin:0;
                    background-color:rgb(220,220,220);
                    height: 100%;   
                
                }

              
            
    

             input[type=text], input[type=int], input[type=email], input[type = password], input[type=date],  input[type=time]  {
                margin-bottom: 15px;
                width:80%;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 12px;
                box-sizing: border-box;
                margin: 0 auto;
                margin-bottom: 15px;
                border: none;
                border-bottom: 2px solid black;
                border-radius: 5px
            }
           
          

            
            input[type = "submit"]{
                width:300px;
                height: 40px;
                border: 1px solid;
                background:darkgrey ;
                color:white;
                border-radius: 20px;
                font-size: 13px;
                color: #e9f4fb;
                font-weight: 700;
                cursor: pointer;
                outline: none;
                position:absolute;
                left:15%;
                bottom:5%
            }

            .room_option{
                width:80%;
                padding-top: 8px;
                padding-bottom: 8px;
                border: 1px solid #dddddd;
                font-size: 12px;
                border-radius: 4px;
                box-sizing: border-box;
                margin: 0 auto;
                margin-bottom: 15px;
            }

            td {
                height: 50px;
                width:200px;
                padding-top: 15px;
                padding-bottom: 8px;
                color:lightgrey;
                text-align: left;
                }
                

            </style>
        </head>
        <body>
        <form class = "payment_form" action = "recep-add-payment.php" method="post">
        <div class = reservation_details>
            <h2 class = reservation_form_title style = "color:lightgrey";> Payment form </h2>
        <table class = reservation_form_table>
            <tr>
                <td>Customer ID:</td>
                <td><input type = "text" name = "customer_id" id="customer_id" value="<?php echo $_GET['customer_id']?>"readonly></td>
            </tr>
            <tr>
                <td>Booking ID:</td>
                <td><input type = "text" name = "booking_id" id="booking_id" value="<?php echo $_GET['booking_id']?>" readonly></td>
            </tr>
            <tr>
                <td>Room ID:</td>
                <td><input type = "text" name = "room_id" id="room_id" value="<?php echo $_GET['room_id']?>" readonly></td>
            </tr>
            <tr>
                <td>Payment Amount(RM): </td>
                <td><input type = "int" name = "payment_amount" id="payment_amount"value = "<?php 
                include "conn.php";
                $booking_id = $_GET['booking_id'];
                $query="SELECT * FROM room INNER JOIN booking on booking.room_id = room.room_id
                WHERE booking_id = $booking_id";
                $checking_result=mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($checking_result)){
                    $sDate = $row['booking_start_date'];
                    $eDate = $row['booking_end_date'];
                    $startDate = new Datetime ($sDate);
                    $endDate = new Datetime ($eDate);
                    $diff=date_diff($startDate,$endDate);
                    $duration = $diff->format("%a");
                    $pricePerNight = $row['price_per_night'];
                    $roomPrice = $duration * $pricePerNight;
                    $serviceTax = ($duration * $pricePerNight) * 0.1;
                    $total = $roomPrice + $serviceTax;
                    echo $total;
                }
                ?>" readonly ></td>
            </tr>
            
            <tr>
                <td>Discount Get(RM):</td>
                <td><input type = "int" name = "discount" id="discount" value="<?php 
                include "conn.php";
                $booking_id = $_GET['booking_id'];
                $query="SELECT * FROM room INNER JOIN booking on booking.room_id = room.room_id
                WHERE booking_id = '$booking_id'";
                $checking_result=mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($checking_result)){
                    $sDate = $row['booking_start_date'];
                    $eDate = $row['booking_end_date'];
                    $startDate = new Datetime ($sDate);
                    $endDate = new Datetime ($eDate);
                    $diff=date_diff($startDate,$endDate);
                    $duration = $diff->format("%a");
                    $pricePerNight = $row['price_per_night'];
                    $roomPrice = $duration * $pricePerNight;
                    $serviceTax = ($duration * $pricePerNight) * 0.1;
                    $total = $roomPrice + $serviceTax;
                    if($total <=10000){
                        $discount = $total*0.1;
                    
                    }
                    else if ($total>10000){
                        $discount =$total*0.2;
                    }
                    $discount_get = $discount;
                    echo $discount_get;
                }
                ?>" readonly></td>
            </tr>
            <tr>
                <td>Amount Paid(RM):</td>
                <td><input type = "int" name = "amount_paid" id="amount_paid" value="<?php 
                include "conn.php";
                $booking_id = $_GET['booking_id'];
                $query="SELECT * FROM room INNER JOIN booking on booking.room_id = room.room_id
                WHERE booking_id = '$booking_id'";
                $checking_result=mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($checking_result)){
                    $sDate = $row['booking_start_date'];
                    $eDate = $row['booking_end_date'];
                    $startDate = new Datetime ($sDate);
                    $endDate = new Datetime ($eDate);
                    $diff=date_diff($startDate,$endDate);
                    $duration = $diff->format("%a");
                    $pricePerNight = $row['price_per_night'];
                    $roomPrice = $duration * $pricePerNight;
                    $serviceTax = ($duration * $pricePerNight) * 0.1;
                    $total = $roomPrice + $serviceTax;
                    if($total <=10000){
                        $discount = $total*0.1;
                    
                    }
                    else if ($total>10000){
                        $discount =$total*0.2;
                    }
                    $discount_get = $discount;
                    $amount_paid = $total - $discount_get;
                    echo $amount_paid;
                }
                ?>" readonly></td>
            </tr>
            <tr>
                <td colspan = 2 >
                    <input type="submit" class="confirmbtn" value="confirm"></input>
                </td>
            </tr>
        </table>
        </div>
        </form>
        </body>