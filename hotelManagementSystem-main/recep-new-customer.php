<!DOCTYPE html>
    <html lang = "en">
        <head>
            <style>
                
                .customer_form{
                   position:absolute;
                   background:red;
                   text-align:center;
                   padding-left:30px;
                   padding-right:10px;
                    left:35%;
                    top:5%;
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

    

             input[type=text], input[type=tel], input[type=email], input[type = password], input[type=date],  input[type=time] {
                
                width:80%;
                padding-top: 12px;
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
                padding-top: 10px;
                padding-bottom: 15px;
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
                text-align: left;
                color:lightgrey;
                }
                

            </style>
        </head>
        <body>
        <form class = "customer_form" action = "recep-add-customer.php" method="post">
        <div class = customer_details>
            <h2 class = customer_form_title style = "color:lightgrey";> Customer Registration Form </h2>
        <table class = customer_form_table>
            <tr>
                <td>Customer's Name:</td>
                <td><input type = "text" name = "customer_name" id="customer_name" ></td>
            </tr>
            <tr>
                <td>Customer's Password: </td>
                <td><input type = "text" name = "customer_password" id="customer_password" ></td>
            </tr>
            <tr>
                <td>Customer's Nationality: </td>
                <td><input type = "text" name = "customer_nationality" id="customer_nationality" ></td>
            </tr>
            <tr>
                <td>Customer's Contact No: </td>
                <td><input type = "tel" name = "customer_phone_no" id="customer_phone_no" ></td>
            </tr>
            <tr>
                <td>Customer's Email: </td>
                <td><input type = "email" name = "customer_email" id="customer_email" ></td>
            </tr>
            <tr>
                <td>Customer's IC Number: </td>
                <td><input type = "text" name = "ic_no" id="ic_no" ></td>
            </tr>
            <tr>
                <td>Customer's Passport No: </td>
                <td><input type = "text" name = "passport_no" id="passport_no" ></td>
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