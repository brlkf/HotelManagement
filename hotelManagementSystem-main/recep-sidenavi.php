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
                    padding-top: 0px;
                    background-color:rgb(0,0,57);
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
                    background-color:rgb(0,33,71) ;
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
                    margin-top:13px

                    
                }
                .menu-text{
                    margin-top:8px;
                }

                .side-navi-links li{
                    list-style:none;
                    line-height:47px;
                    width:250px;
                    text-align:center ;
                                
                }

                .side-navi-links li a {
                    display:flex;
                    text-decoration: none;
                    background-color:rgb(145,163,176);
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
                .side-navi-links li a:hover{
                    background-color:rgb(76,81,109); 
                
                }
                .dropdown-container {
                    display: none;
                    background-color: #262626;
                    
                    }
               
                .dropdown-btn{
                    display:flex;
                    text-decoration: none;
                    background-color:rgb(0,33,71);
                    color:black;
                    width:250px;
                    text-align:center;
                    line-height:47px;
                    border:none;
                }   
                .dropdown-icon{
                    display:flex;
                    padding-left:90px;
                    padding-right:0px;
                    margin-top:13px
                }
                .dropdown-icon1{
                    display:flex;
                    padding-left:100px;
                    padding-right:0px;
                    margin-top:13px
                }
                

                
            </style>
        </head> 
        <body>
            <div class  ="side-navi" id= side-navi>
                <header> Admin Panel </header>
                <button class="closeSidebarBtn" onclick="closeSideBar()"> X</button>

                    <ul class = "side-navi-links">
                    <li>
            <!-- Logo -->
            
                        <img id = "logo" src="blue_tears.jpg" alt="Blue Tears"style='max-width: 50%;
                        max-height: 50%;padding-top:10px';>
            
                    </li>
                    <li>
                        <a class = 'active' href="recep-home.php">
                        <div class = "menu-icon"><i class="fa fa-home" style="font-size:28px;color:black"></i></div>
                        <div class ="menu-text">H O M E</div>
                    </a>  
                    </li>
                    <li>
                    <button class="dropdown-btn"onclick = displaymenu()>
                        <div class = "menu-icon"><i class="fa fa-user" style="font-size:28px;color:lightgrey"></i></div>
                        <div class ="menu-text" style="color:lightgrey;padding-left:5px">U S E R</div>
                         <div class ="dropdown-icon1"> <i class="fa fa-caret-down" style="font-size:28px;color:lightgrey;float: right;
                    padding-right: 8px"></i>
                    </div>
                    </button>  
                    </li>
                    <li>
                        
                        <div class="dropdown-container"id = "dropdown-container">
                        <a href="recep-profile.php" style = "padding-left:20px">PERSONAL DETAILS</a>
                        <a href="recep-salary.php" style = "padding-left:20px">SALARY</a>
                        <a href="recep-schedule.php" style = "padding-left:20px">SCHEDULE </a>
                        <a href="recep-attendance.php" style = "padding-left:20px">ATTENDANCE</a>
                    </div>
                    </li>
                    <li>
                    <button class="dropdown-btn" onclick = displaymenu2()>
                        <div class = "menu-icon"><i class="fa fa-home" style="font-size:28px;color:lightgrey"></i></div>
                        <div class ="menu-text"style="color:lightgrey">H O T E L</div>
                         <div class ="dropdown-icon"> <i class="fa fa-caret-down" style="font-size:28px;color:lightgrey;float: right;
                    padding-right: 8px"></i>
                    </div>
                    </button>  
                    </li>
                    <li>
                        
                        <div class="dropdown-container" id = "dropdown-container2">
                        <a href="recep-customer.php" style = "padding-left:20px">CUSTOMER</a>
                        <a href="recep-feedback.php" style = "padding-left:20px">FEEDBACK</a>
                        <a href="recep-payment.php" style = "padding-left:20px">PAYMENT</a>
                        <a href="recep-room.php" style = "padding-left:20px">ROOM</a>
                        <a href="recep-reservation.php" style = "padding-left:20px">RESERVATION</a>
                        
                    </div>
                    </li>
            
                </ul>
            </div>
            <script>
                function displaymenu(){
                    var dropdownContent = document.getElementById("dropdown-container");
                    if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                    } else {
                    dropdownContent.style.display = "block";
                    }
                    }

                function displaymenu2(){
                    var dropdownContent = document.getElementById("dropdown-container2");
                    if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                    } else {
                    dropdownContent.style.display = "block";
                    }
                }
            </script>
        </body>
    </html>