<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedule List</title>
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
            <!-- End of side bar -->

            <!-- Staff Table -->
            <div id = "staff">
            <div class = page_content>
                <div class = "table_content">
                    <div>
                        <h2 class="table_tittle"> Schedule List </h2>
                    </div>
                </div>
                <form class = "filter_part" method = "post">
                    <div class  = "filter_part_sec">
                        <input type = "text" name="search_key" placeholder = "Please enter employee name" ></input>
                    </div>
                    <div class = "filter_part_sec">
                        <button class="filterResultBtn" name="searchBtn" type="submit">Search</button>
                        <button class = "addschedule" name="addschedule">Add Schedule</button>
                    </div>
                    
                </form>
            </div>
                <div>
                    <div class = "member_schedule">
                        <?php
                            include("conn.php");
                            $id = intval($_GET['id']);
                            $staff=mysqli_query($conn, "SELECT * FROM employee WHERE employee_id=$id");
                            while($row = mysqli_fetch_array($staff)){
                                $profile ='<img class ="profile" src="data:image;base64,'.base64_encode($row['employee_profilepic']).'" alt = "Profile">';
                                
                                echo $profile;
                                echo "";
                                $name = '<a class="name" href="admin_profile.php">'.$row['employee_name'].'</a>';
                                echo $name;
                                echo "<br>";
                            }
                        ?>
                    </div>
                    <div>
                        <?php
                            if (isset($_POST["addschedule"])){
                                echo "<script>window.location.href='add_schedule.php?id=$id';</script>";
                            }
                            include("conn.php");

                            $search_key = "";

                            if(isset($_POST['searchBtn'])){
                                $search_key = $_POST['search_key'];
                            }
                        
                            $result=mysqli_query($conn,"SELECT * FROM `schedule` WHERE employee_id=$id AND work_date LIKE '%$search_key%' ORDER BY `schedule_id` DESC");
                        ?>
                    </div>
                </div>
                <div class = "reservation_content">
                    <table class= "reservation_table">
                        <tr>
                            <th>Work Date</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Hours</th>
                            <th>Manage</th>
                        </tr>

                        <?php
                            if(isset($result)){
                                while($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row['work_date']."</td>";
                                    echo "<td>".$row['work_start_time']."</td>";
                                    echo "<td>".$row['work_end_time']."</td>";

                                    $time1 = strtotime($row['work_start_time']);
                                    $time2 = strtotime($row['work_end_time']);
                                    $difference = round(abs($time2 - $time1) / 3600,2);

                                    echo "<td>$difference</td>";
                                    echo "<td><a class =\"button\" href=\"delete.php?id=$row[schedule_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
                                    <a class =\"button\" href=\"edit_selected.php?id=$row[schedule_id]\">Edit</a></td>";
                                    echo "</tr>";
                                }
                            }
                            else{
                                echo "Don't have schedule yet";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>