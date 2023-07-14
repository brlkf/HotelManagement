<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link  rel="stylesheet">
    <?php include "cus_session.php"?>
    <style>
        body{
                margin:0;
                background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),
                url("Hotel2.png");
                background-repeat: no-repeat;
                background-size: 1600px 800px;
            }


    .table{
        table-layout:fixed;
        border-collapse: collapse;
        font-size: 0.9em;
        font-family: sans-serif;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border-radius: 25px;
        overflow: hidden; 
        align: center;
        width: 40%;
    }
    
    .table thead tr{
        height:200px;
    background-color: rgba(56, 56, 56, 0.66);
    
    text-align: left;
    }


    .table tbody tr{
        border-bottom: 1px solid #dddddd;
    }
    .table tbody tr:nth-of-type(odd){
    background-color: white; 
    }
    .table tbody tr:nth-of-type(even){
    background-color: #f3f3f3; 
    }




    i{
        color:red;
        font-size:20px
    }
    .wordalign{
        display:flex;
        margin-left:540px
    }

    .b1{
        height:50px;
        width:300px;
        font-size: 20px;
        border-radius: 25px;
        border: 0px;
        background:#383838;
        color:white;
        transform: translate(60%);
    }

    .b1:hover{
        height:50px;
        width:300px;
        font-size: 20px;
        border-radius: 25px;
        border: 0px;
        background:rgba(255,255,255,1);
        color:black;
        transform: translate(60%);
    }

    .right h3{
        margin-right:70px;
    }

    .left h3{
        margin-left:50px;
    }
    .payment-container{
            position:absolute;
            justify-content: center;
            width: 45%;
            background-color: #dddddd;
            border-radius: 10px;
            padding: 40px;
            align-items: center;
            margin-left:27.5%;
           
        }

        

        .row{
            display: flex;
        }

        input[type=text], [type=password],select{
            margin-bottom: 15px;
            max-width: 300px;
        }

        input {
            width: 100%;
            padding: 9px;
            border: 1px solid #dddddd;
            font-size: 12px;
            border-radius: 4px;
            box-sizing: border-box;
            display: block;
            margin-bottom: 15px;
        }

        .Expiry {
            width: 50%;
            margin-right: 20px;
        }

        input[type = "submit"]{
            width: 50%;
            height: 50px;
            border: 1px solid;
            background:yellow ;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            transform: translate(40%);
            box-shadow: inset 0 0 0 0 black;
            transition: ease-out 0.3s;
        }

        input[type = "submit"]:hover{

            box-shadow: inset 400px 0 0 0 rgb(128, 106, 106) ;
            color: white;
        }

        .cancelPayment{
            position:absolute;
            right:40px;
            top:55px;
            border:none;
            font-weight: bold; 
            padding: 10 10px
        }

        .title h2{
            color:black;
            text-align:center;

        }
        .height{
        height:100px;
    }

    </style>
    <title>document</title>
</head>
<div class="height"></div>
    <div class = "payment-container" id = "payment-container" >
        <div class="title">
            <h2>Confirm Your Payment</h2>
        </div>
        <div class = "row">
                    <div class = Expiry>
                        <h3>Name on card:<h3>
                        <input type = "text" name = "name"  required="required" >
                    </div>
                    <div class = "right">
                    <h3>Total: <?php echo $_GET['total'] ?></h3> 
                    </div>
            </div>
            <div class = "row">
                    <div class = Expiry>
                        <h3>Card Number:<h3>
                        <input type = "text" name = "name"  required="required" >
                    </div>
                    <div class = "right">
                    <h3>Discount applied: <?php $total= intval($_GET['total']);
                if($total <=10000){
                        $discount = $total*0.1;
                    
                    }
                    else if ($total>10000){
                        $discount =$total*0.2;
                    }
                    $discount_get = $discount;
                    echo $discount_get;
                ?>
                </h3>
                    </div>
            </div>
                <div class = "row">
                    <div class = Expiry>
                        <h3>Expiry Date:<h3>
                        <input type = "text" name = "name"  required="required" >
                    </div>
                    <div class = "right">
                    <h3>Final Price: <?php $final=$total-$discount_get;
                echo $final;
                ?></h3>
                    </div>
                </div>
            
         
               
                <div class = 'CVV'>
                    <h3>CVV:<h3>
                    <input type = "password" name = "name"  required="required" ></input>
                </div>
            <div class="field">
            <form action="cus_add_payment.php" method="POST">
                    <input name="final" type="hidden" value=<?php echo $final?>>
                    <input name="discount" type="hidden" value=<?php echo $discount_get?>>
                    <input name="booking_id" type="hidden" value=<?php echo $_GET['booking_id']?>>
                    <button class="b1">Confirm Purchase</button></form></div>
        </div>
    
        </form></div>