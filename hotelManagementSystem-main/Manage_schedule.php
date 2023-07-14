<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee to Schedule</title>
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
                <div>
                    <div class = page_content>
                        <div class = "table_content">
                            <div>
                                <h2 class="table_tittle"> Schedule </h2>
                            </div>
                        </div>
                    </div>
                    <form class = "filter_part" method = "post">
                        <div class  = "filter_part_sec">
                            <input type = "text" name="search_key" placeholder = "Please enter employee name" ></input>
                        </div>
                        <div class = "filter_part_sec">
                            <button class="filterResultBtn" name="searchBtn" type="submit">Search</button>
                        </div>
                    </form>

                </div>
                <div class = "reservation_content">
                    <?php
                        include("conn.php");

                        $search_key = "";

                        if(isset($_POST['searchBtn'])){
                            $search_key = $_POST['search_key'];
                        }
                    
                        $result=mysqli_query($conn,"SELECT * FROM employee WHERE employee_name LIKE '%$search_key%' ORDER BY employee_id");
                    ?>
                    
                    <table cellspacing="0" class= "reservation_table">
                        <tr>
                            <th>ID</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Conduct</th>
                            <th>Schedule</th>
                            
                        </tr>

                        <?php
                            while($row = mysqli_fetch_array($result)) {
                                
                                echo "<tr>";
                                echo "<td>".$row['employee_id']."</a></td>";
                                echo '<td><img class ="profile_image" src="data:image;base64,'.base64_encode($row['employee_profilepic']).'" alt = "Profile"></a></td>';
                                echo "<td>".$row['employee_name']."</a></td>";
                                if($row['position'] == "manager"){
                                    echo "<td>Manager</td>";
                                }
                                else if($row['position'] == "receptionist"){
                                    echo "<td>Receptionist</td>";
                                }
                                else{
                                    echo "<td>Cleaner</td>";
                                }
                                echo "<td>".$row['employee_email']."<BR>".$row['employee_phone_no']."<BR></a></td>";
                                echo "<td><a class = 'button' href=\"edit_schedule.php?id=$row[employee_id]\">Manage</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>