<!DOCTYPE html>

<html>
    <head>
        
        <title>Home</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <?php include "cus_session.php"?>
        <style>
            html{
                scroll-behavior:smooth;
            }
            body{
                margin:0;
                background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),
                url("Hotel2.png");
                background-repeat: no-repeat;
                background-size: 1600px 800px;
            }


            .logo{
                width:100px;
                margin-left:75px;
                cursor:pointer;
            }
            .navigation_bar ul li{
                list-style:none;
                display:inline-block;
                margin:0 30px;
            }
            .navigation_bar ul li a{
                text-decoration:none;
                font-size:20px;
                color:white;
                text-transform: uppercase;
            }

            h5{
                color:#101820FF;
                font-size:30px
            }


            a{
                font-size:15px;
                color:black;
                text-decoration:none;
            }
            .navigation_bar ul li a:hover{
                color: darkred;
            }

            .price{
                background-color: rgba(255, 204, 153);
            }

            .price table{
                border-collapse:collapse;
            }

            .price td{
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                text-align: center;
                font-size:20px
            }

            .price td p{
                font-family: Verdana;
                margin-left:25px;
                margin-right:25px;
            }

            .room_image{
                width:250px;
                margin-top:15px
            }


            h1,h3{
                font-family: Lucida Handwriting ;
                color:white;
                text-transform: uppercase
            }

            h2{
                font-size: 30px;
                margin-right:300px;
                color:white
            }

            h4{
                font-size: 40px;
                color:#101820FF;
            }
            select{
                height:50px;
                width:200px;
                font-size: 15px;
                color:#101820FF;
                text-align:center;
                border-radius: 10px;
                border: 2.5px solid #101820FF;
                background:transparent;
            }

            option{
                color:black;
                background:white;
            }

            .room table{
                border-collapse:collapse;
                table-layout: fixed;
                margin:auto;
                width: 900px ;
                border-radius: 15px;
                overflow: hidden; 
                
            }

            input{
                height:45px;
                width:200px;
                font-size: 15px;
                color:#101820FF;
                text-align:center;
                margin: 10px;
                border-radius: 10px;
                border: 2.5px solid #101820FF;
                background:transparent;
            }

            input:focus{
                height:45px;
                width:200px;

            }

            button{
                height:50px;
                width:300px;
                font-size: 20px;
                border-radius: 25px;
                border: 2px solid black;
                background:transparent;
            }

            button:hover{
                background:rgba(150,150,255,0.5);
                color:white
            }

            ::placeholder{
                color:black
            }
            

            .room td{
                text-align: center;
                font-size:20px;
                padding: 1em;
                background: #101820FF;
                border-right: 2px solid white;
                border-bottom: 2px solid white;
            }

            .room th{
                text-align: center;
                font-size:20px;
                padding: 1em;
                background: #F2AA4CFF;
                border-right: 2px solid white;
                border-bottom: 2px solid white;
            }

            .room td p{
                color:white;
                margin-left:25px;
                margin-right:25px;
            }
            .room th p{
                color:white;
                text-align: center;
                margin-left:25px;
                margin-right:25px;
            }

            .b1{
                height:50px;
                width:300px;
                font-size: 20px;
                border-radius: 25px;
                border: 0px;
                background:rgba(0,0,0,1);
                color:white;
            }

            .b1:hover{
                height:50px;
                width:300px;
                font-size: 20px;
                border-radius: 25px;
                border: 0px;
                background:rgba(255,255,255,1);
                color:black;
            }

            .two{
                display:flex;
                justify-content:center;
            }

            .book{
                background:#F2AA4CFF;
            }

            p{
                font-size:24px;
                text-align:justify;
            }

            .about{
                margin:100px;
            }

            .footer{
                color:white;
                background:black;
            }

            .footer p{
                font-size:14px;
                text-align:justify;
            }
            .footer h5{
                color:white;
                font-size:14px;
            }
            .footer a{
                color:white;
                font-size:14px;
            }
            .footer table{
                text-align:left;
                width:100%;
                border:1px black;
            }

            .footer table td{
                text-align:left;
            }
            .footer table th{
                height:10px;
            }
            

            
            

            
        </style>
        
        
    </head>
    <body>
        
        <div class="navigation_bar">
            <?php include "cus_header(log in).php"?>
        </div>
        <br><br><br><br>
        <h1 align="center">Hotel Room Reservation</h1>
        <br><br>
        <h3 align="center">Do you want to book a room?</h3>
        <br><br>
        <div class="two">
            <form action="#about">
                <button class="b1">About Us</button>
            </form>&nbsp&nbsp&nbsp&nbsp&nbsp
            <form action="#choose">
                <button class="b1">Book Now</button>
            </form>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="book" id="choose">
        <br>
        <h4 align="center">Book Room</h4>
        <h5 align="center">Enter Your Booking Details Below</h5>      
  <form action="cus_view_room(log in).php" method="POST" align="center">
                <div>
                    <input name="start_date" type="text" placeholder="Start Date"
                    onfocus="(this.type='date')">
                    <input name="end_date" type="text" placeholder="End Date"
                    onfocus="(this.type='date')">
                    <select class = "room_option" required="required" name = "room_option" id = "room_option">
                        <option value="">Room Type</option>
                        <option value = "single" name = "single">Single</option>
                        <option value = "double" name = "double">Double</option>
                        <option value = "master" name = "master">Master</option>
                    </select>
                </div>
                <br><br><br>
                <div>
                    <button class="b1">Search</button>
                </div>
                </form>
            <br><br><br>
        </div>
        <div class="about" id="about"><br>
            <h4 align="center">About Us</h4>     
            <div >
                <p>
                    Blue Tears Hotel was founded by its owner, Mrs. Cindy in 2020. It is located at Pulau Sembilan, Perak. In 2021, Mrs. Cindy associated with Mrs. Xue Li, Mr. Lee, and Mr. Diong as the partners in establishing Blue Tears Hotel. The name “Blue Tears” is originated from its natural Blue Tears phenomenon that occurs naturally at night. Besides this, the Blue Tears Hotel also provides awesome relaxation to travelers with its services such as the dining room, gym, and swimming pool. 
                </p>
            </div>
            <div class="room">
                <h4 align="center">Room Type</h4>
                <table>
                <tr>
                    <th><img src="singleroom.jpg" class="room_image">
                        <p><b>Single Room</b></p>
                    </th>
                    <td colspan="2"><p>&#10004;&nbsp 1 people</p>
                    <p>&#10004;&nbsp RM600</p>
                    <p>&#10004;&nbsp Sea View and Small TV are provided</p>
                    </td>
                <tr>
                </td>
                    <td colspan="2"><p>&#10004;&nbsp 2~3 people (family with a baby)</p>
                    <p>&#10004;&nbsp RM800</p>
                    <p>&#10004;&nbsp Sea View, Spa and Small TV are provided</p></td>
                    <th><img src="doubleroom.jpg" class="room_image">
                        <p><b>Double Room</b></p>
                    </th>
                </tr>
                <tr>
                    <th><img src="masterroom.png" class="room_image">
                        <p><b>Master Room</b></p>
                    </th>
                    <td colspan="2"><p>&#10004;&nbsp 3~4 people</p>
                    <p>&#10004;&nbsp RM1000</p>
                    <p>&#10004;&nbsp Sea View, Spa, Bathtub and Small TV are provided</p></td>
                </tr>
            </table>
            </div>
        </div>
        <div class="footer">
        <table>
        <tr>
            <td>
            <?php echo"Copyright &copy;" . date("Y") . " Blue Tears Hotel"?>
            </td>
            <th>
            <h5>Contact Us</h5>
            <h5>Call Us at:</h5>
            <p><a href="tel:+01165543940">01165543940 Mr.Diong</a>&nbsp&nbsp&nbsp
            <a href="tel:+0193593898">0193593898 Mrs.Cindy</a></p>
            <h5>Email Us:</h5>
            <a href="mailto:diongdiong2014@gmail.com">diongdiong2014@gmail.com</a>
            </th>
            <th><h5>Location :</h5>
            10,Jalan WASD, 32300 Pulau Sembilan, Perak
            <h5>Terms and Condition:</h5>
            <p>1.No cancel of booking is allowed </p>
            <p>2.No refund is allowed </p>
            </th>
        </tr>
    </table></div></body>
</html>
        