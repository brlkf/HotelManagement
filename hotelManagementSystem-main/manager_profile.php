<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
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


        <div class = "profileContents">
            <div class ="profile_content1">
                <?php
                    include "conn.php";
                    $id = $_SESSION["mySession"];
                    $query= "SELECT * FROM employee WHERE employee_id = $id";
                    $result = mysqli_query($conn, $query);
                    while ($row=mysqli_fetch_assoc($result)) {
                        echo '<div style="float:left; border:1px #000 solid; padding:5px; margin: 5px;">';
                        echo '<img src="data:image/jpg;base64,' . base64_encode($row['employee_profilepic']) .'" width="350px" height="auto"/><br>';
                        echo '</div>'; 
                        mysqli_close($conn);
                    }
                ?>
            </div>

            <div class = profile_content2>
                <table class = admin_detail_table>
                    <?php
                        include "conn.php";
                        $query = "SELECT * FROM employee WHERE employee_id =$id";
                        $result=mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result)){

                        echo "<tr>";
                        echo "<td>";
                        echo"ADMIN ID : ";
                        echo"</td>";
                        echo"<td>";
                        echo $row['employee_id'];
                        echo"</td>";
                        echo "</tr>";
                        
                        echo "<tr>";
                        echo "<td>";
                        echo"NAME : ";
                        echo"</td>";
                        echo"<td>";
                        echo $row['employee_name'];
                        echo"</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td>";
                        echo"POSITION : ";
                        echo"</td>";
                        echo"<td>";
                        echo $row['position'];
                        echo"</td>";
                        echo"</tr>";


                        echo "<tr>";
                        echo "<td>";
                        echo"GENDER : ";
                        echo"</td>";
                        echo"<td>";
                        echo $row['employee_gender'];
                        echo"</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td>";
                        echo"CONTACT NO : ";
                        echo"</td>";
                        echo"<td>";
                        echo $row['employee_phone_no'];
                        echo"</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td>";
                        echo"EMAIL : ";
                        echo"</td>";
                        echo"<td>";
                        echo $row['employee_email'];
                        echo"</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td>";
                        echo"ADDRESS : ";
                        echo"</td>";
                        echo"<td>";
                        echo $row['employee_address'];
                        echo"</td>";
                        echo "</tr>";
                        }
                        mysqli_close($conn); 
                    ?>   
                </table>
            </div>
        </div>
    </div>
</body>
</html>