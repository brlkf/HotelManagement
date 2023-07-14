<!DOCTYPE html>
    <html lang = "en">
        <head>
            <style>
                
                .reservation_form{
                   position:absolute;
                   background:red;
                   text-align:center;
                   padding-left:30px;
                   padding-right:10px;
                    left:40%;
                    top:30%;
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
                bottom:8%
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
        <form class = "reservation_form" action = "recep-checking-room-availability.php" method="post">
        <div class = reservation_details>
            <h2 class = reservation_form_title style = "color:lightgrey";> Room Selection form </h2>
        <table class = reservation_form_table>
           
            <tr>
                <td>Room Type:</td>
                <td><select class = "room_option" name = "room_option" id = "room_option">
                    <option value = "single" name = "single">single</option>
                    <option value = "double" name = "double">double</option>
                    <option value = "master" name = "master">master</option>
                </select>
                </td>
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