<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance</title>
    <link href = "manager.css" rel = "stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="mng.action.js"></script>

</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION["mySession"])){
            echo "<script>window.location.href= \"recep-login.php\";</script>";
        }
    ?> 
    <div id="wrapper">
        <div id="sidebar">
            <ul class="navbar">
                <!-- Logo -->
                <button class="closeside" onclick="closeSideBar()"> X</button>
                <a href="Manager_home.php">
                    <img id = "logo" src="image/logo.png" alt="Blue Tears">
                </a>

                <hr class = "sidebar-div">

                <li>
                    <a href = "Manager_home.php">
                        <i class='bx bxs-dashboard'></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <hr class = "sidebar-div">

                <div class = "bar-header">
                    <i class='bx bxs-user-circle'></i>
                    <span>Personal</span>
                </div>

                <li>
                    <a href = "Attendance.php">
                        <span>Attendance</span>
                    </a>
                </li>
                <li>
                    <a href = "Manager_salary.php">
                        <span>Salary</span>
                    </a>
                </li>

                <hr class = "sidebar-div">

                <div class = "bar-header">
                    <i class='bx bxs-user-account'></i>
                    <span>Staff</span>
                </div>

                <li>
                    <a href = "staff.php">
                        <span>Staff Details</span>
                    </a>
                </li>
                <li>
                    <a href = "Manage_schedule.php">
                        <span>Schedule</span>
                    </a>
                </li>
                    
                <hr class = "sidebar-div">

                <div class = "bar-header">
                    <i class='bx bxs-report' ></i>
                    <span>Report</span>
                </div>

                <li>
                    <a href = "salary_detail.php">
                        <span>Salary Report</span>
                    </a>
                </li>
                <li>
                    <a href = "sales_detail.php">
                        <span>Sales Report</span>
                    </a>
                </li>
                <li>
                    <a href = "attendance_detail.php">
                        <span>Attendance Report</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End of side bar -->

        <!-- Main Content -->
        <div id = "main_content">
            <!-- Topbar -->
            <nav id = "topbar">
                    <button class="openside" onclick="openSideBar()">☰</button>
                    <div>
                    <h2 class="top-navi-heading"> Blue Tears </h2>
                    </div>
                    <div>
                        <a class="logout" href="Manager_logout.php">LOGOUT</a>
                    </div>
            </nav>

            <div id="staff">
                <div class = page_content>
                    <div class = "table_content">
                        <div>
                            <h2 class="table_tittle"> Attendance </h2>
                        </div>
                    </div>
                </div>

        <div>
            <div class = "button_content">
                <div class = "home_page_sec"  style=padding-top:10px>
                        <a class = "attendance_button" href="recep-update-attendance.php">SIGN IN</a>
                </div>
                <div class = "home_page_sec" style=padding-top:10px;margin-left:30px;>
                        <a class = "attendance_button" href="recep-update-attendance.php">SIGN OUT</a>
                </div>
            
            </div>
        </div>
        <div class = "reservation_content">
            <table class= "reservation_table" > 
                <tr>
                    <th> <font face="Arial">Attendance ID</font> </th> 
                    <th> <font face="Arial">Date</font> </th> 
                    <th> <font face="Arial">In Time</font> </th> 
                    <th> <font face="Arial">Out Time</font> </th> 
                    <th> <font face="Arial">Working Time</font> </th>
                </tr>
                
                <?php
                include "conn.php";
                $id = $_SESSION["mySession"];
                $query="SELECT * FROM attendance where employee_id = $id ORDER BY attendance_id DESC";
                $search_result=mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($search_result)){
                    echo "<tr>";
                    echo "<td>";
                    echo $row['attendance_id'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['work_date'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['sign_in_time'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['sign_out_time'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['working_time'];
                    echo "</td>";
                        }
                    mysqli_close($conn); //to close the database connection
            ?>
        </table>

    </div>
    </div>
        
    </body>
</html>