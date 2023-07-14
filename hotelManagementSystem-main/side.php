<!DOCTYPE html>
    <html lang = "en">
        <head>
        <title> Document </title>
        <script type="text/javascript" src="action.js"></script>
        <style>
         

#side-navi{
    height: 100%;
    width: 0px;
    position: fixed;
    top: 0;
    left: 0;
    transition: 0.5s;
    padding-top: 0px;
    background-color:	#4f4a41;
    justify-content: space-around;
    overflow: hidden;
   
}

.navbar{
    display:inline-block;
                    justify-content:space-around;
                    width: 250px;
                    margin-top:0px;
                    text-align:left;
                    background-color: #000228;
    background-image: linear-gradient(180deg, #000228 60%, #470aa5 100%);
    min-height: 100vh;
    font-family: 'Patrick Hand', cursive;
    box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
    z-index: 1;
    transition: 0.5s;
}

#logo{
    display: block;
    width: 60%;
    margin-left: auto;
    margin-right: auto;
    clip:rect(0px, 0px, 90px, 0px);
}

/*.sidebar-div{
    margin: 0 1rem 1rem;
    border-top: 1px solid #470aa5;
    border-left: #000228;
    border-bottom: #000228;
    border-right: #000228;
}*/

#side-navi ul li{
    list-style:none;
                    line-height:80px;
                    width:250px;
                    text-align:center ;
                    border-top: 1px solid #470aa5;
    border-left: #000228;
    border-bottom: #000228;
    border-right: #000228;
}

#side-navi ul li a{
    align-items: center;
    text-decoration: none;
    display: flex;
    color: #cac9cf;
    transition: all 0.4s ease;
    padding-left: 5px;
}

#side-navi ul li a:hover{
    background: #6618e6;
    color: #cac9cf;
    border-radius: 5px;
}

#side-navi ul li a i{
    min-width: 40px;
    border-radius: 5px;
    line-height: 40px;
}

.bar-header{
    align-items: center;
    text-decoration: none;
    display: flex;
    color: #7c8494;
    padding-left: 5px;
    text-align: center;
    line-height: 40px;
    font-size: large;
}

.bar-header i{
    min-width: 40px;
    border-radius: 5px;
    line-height: 40px;
}

#profile_image{
    height: 10px;
    width: 10px;
}

#main_content{
    width: 85%;
}

#topbar {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    float: right;
    height: 4.375rem;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    overflow: hidden;
    top: 0;
    background-color:     #E8E8E8;
    width: 100%;
    justify-content: flex-end;
}

#topbar ul li{
    list-style: none;
    padding-left: 1.5rem;
    padding-right: 1rem;
    float: right;
    text-align: center;
}
.closeSidebarBtn {
                font-size: 20px;
                cursor: pointer;
                background:transparent;
                color: white;
                padding: 10px 20px;
                border: none;
                position: absolute;
                top: 5px;
                left: 190px;
            }

}
</style>
</head>
    <body>
    <div id="side-navi">
    <button class="closeSidebarBtn" onclick="closeSideBar()">X</button>
        <ul class="navbar">
            <li>
            <!-- Logo -->
            
                <img id = "logo" src="blue_tears.jpg" alt="Blue Tears">
            
            </li>
            

            <li>
                <a href = "room_cleaner_home.php">
                    <i class='bx bxs-dashboard'></i>
                    <span>Dashboard</span>
                </a>
            </li>

            

            <div class = "bar-header">
                <i class='bx bxs-user-circle'></i>
                <span>Personal</span>
            </div>

            <li>
                <a href = "room_cleaner-attendance.php">
                    <span>Attendance</span>
                </a>
            </li>
            <li>
                <a href = "room_cleaner-salary.php">
                    <span>Salary</span>
                </a>
            </li>
            <li>
                <a href = "view_schedule_room_cleaner">
                    <span>Schedule</span>
                </a>
            </li>

                
           
        </ul>
    </div>
    <!-- End of side bar -->
</body>
</html>