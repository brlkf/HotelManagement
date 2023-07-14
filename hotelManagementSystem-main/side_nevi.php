<!DOCTYPE html>
    <html lang = "en">
        <head>
            <meta charset="UCF-8">
            <meta name="viewport" content=" width=device width, initial-scale=1.0">
            <title> Document </title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script type="text/javascript" src="action.js"></script>
            <style>
                .side-navi{
                    height: 100%;
                    width: 0px;
                    position: fixed;
                    top: 0;
                    left: 0;
                    transition: 0.5s;
                    padding-top: 0px;
                    background-color:	#4f4a41;
                    justify-content: space-around;
                    overflow-x: hidden;
                    z-index: 1;
                    transition: 0.5s;
                }

                .side-navi header{
                    letter-spacing: 3px;
                    font-size:15px;
                    text-transform: uppercase;
                    font-weight: bold;
                    color:white;
                    text-align: center;
                    line-height: 50px;
                    background-color: 	#112d32;
                    user-select: none;
                    height:50px;

                }

                .side-navi-links{
                    display:inline-block;
                    justify-content:space-around;
                    width: 250px;
                    margin-top:0px;
                    text-align:left;
                                    
                }
                .menu-icon{
                    display:flex;
                    padding-left:20px;
                    padding-right:20px;
                    margin-top:22px

                    
                }

                .side-navi-links li{
                    list-style:none;
                    line-height:80px;
                    width:250px;
                    text-align:center ;
                                
                }

                .side-navi-links li a {
                    display:flex;
                    text-decoration: none;
                    background-color:#6e6658;
                    color:black
                    
                    
                }

                
                .closeSidebarBtn {
                    font-size: 20px;
                    cursor: pointer;
                    background:transparent;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    position:absolute;
                    right:5px;
                    top:5px;
                }

                
            </style>
        </head> 
        <body>
            <div class  ="side-navi" id= side-navi>
                <header> Admin Panel </header>
                <button class="closeSidebarBtn" onclick="closeSideBar()"> X</button>

                    <ul class = "side-navi-links">
                    <li>
                        <a class = 'active' href="recep-home.php">
                        <div class = "menu-icon"><i class="fa fa-home" style="font-size:32px;color:black"></i></div>
                        <div class ="menu-text">Home</div>
                    </a>  
                    </li>
                    <li>
                        <a href="recep-reservation.php">
                        <div class = "menu-icon"><i class="fa fa-bed" style="font-size:32px;color:black"></i></div>
                        <div class ="menu-text">Reservation</div>
                        </a>
                    </li>
                    <li>
                        <a href="recep-reservation.php">
                        <div class = "menu-icon"><i class="fa fa-home" style="font-size:32px;color:black"></i></div>
                        <div class ="menu-text">Room</div>
                        </a>
                    </li>
                    <li>
                        <a href="ticketData_page.php">
                        <div class = "menu-icon"><i class="fa fa-paperclip" style="font-size:32px;color:black"></i></div>
                        <div class ="menu-text">Feedback</div>
                    </a>
                    </li>
                    <li>
                        <a  href="customerData_page.php">
                        <div class = "menu-icon"><i class="fa fa-money" style="font-size:32px;color:black"></i></div>
                        <div class ="menu-text">Payment</div>
                        </a>
                    </li>
                    <li>
                        <a href="ticketData_page.php">
                        <div class = "menu-icon"><i class="fa fa-paperclip" style="font-size:32px;color:black"></i></div>
                        <div class ="menu-text">Feedback</div>
                    </a>
                    </li>
                    <li>
                        <a  href="customerData_page.php">
                        <div class = "menu-icon"><i class="fa fa-briefcase" style="font-size:32px;color:black"></i></div>
                        <div class ="menu-text">Profile</div>
                        </a>
                    </li>
                </ul>
            </div>
        </body>
    </html>