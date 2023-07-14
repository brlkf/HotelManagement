<!DOCTYPE html>
<html>
<head>
    <title>Salary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </div>

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
        <div id = "staff">
            <div class = page_content>
                <div class = "table_content">
                    <div>
                        <h2 class="table_tittle"> Manager Salary </h2>
                    </div>
                </div>
            </div>

            <div class = "reservation_content">
        
                <table class= "reservation_table" > 
                    <tr>
                        <th> <font face="Arial">Year</font> </th> 
                        <th> <font face="Arial">Month</font> </th> 
                        <th> <font face="Arial">Salary Amount (RM)</font> </th> 
                    </tr>
                
                        <?php
                        include "conn.php";
                        $result=mysqli_query($conn,
                        "SELECT `employee`.`employee_id`, `employee`.`employee_name`, `position`, MONTH(`attendance`.`work_date`) as month, 
                        YEAR(`attendance`.`work_date`) as year, ROUND(SUM(`attendance`.`working_time`)* `employee`.salary_per_hour,2)AS salary
                        FROM `employee` INNER JOIN `attendance`
                        ON `employee`.`employee_id` = `attendance`.`employee_id`
                        GROUP BY month
                        ORDER BY month");
                        while($row = mysqli_fetch_array($result)){
                            $monthNum  = $row['month'];
                            $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                            $monthName = $dateObj->format('F');
                            echo "<tr>";
                            echo "<td>";
                            echo $row['year'];
                            echo "</td>";
                            echo "<td>";
                            echo $monthName;
                            echo "</td>";
                            echo "<td>";
                            echo $row['salary'];
                            echo "</td>";
                            echo "</tr>";
                        }
                            mysqli_close($conn); //to close the database connection
                        ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>