<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff List</title>
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

            <!-- Staff Table -->
            <div id="staff">
                <div>
                    <div class = "table_content">
                        <div>
                            <h2 class="table_tittle"> Staff List </h2>
                        </div>
                    </div>
                    <form class = "filter_part" method = "post">
                        <div class  = "filter_part_sec">
                            <input type = "text" name="search_key" placeholder = "Please enter employee name" ></input>
                        </div>
                        <div class = "filter_part_sec">
                            <button class="filterResultBtn" name="searchBtn" type="submit">Search</button>
                            <button class = "addschedule" name="addstaff">Add Staff</button>
                            <?php
                            if (isset($_POST["addstaff"])){
                                echo "<script>window.location.href='add_staff.php';</script>";
                            }
                            ?>
                        </div>
                        
                    </form>
                </div>
                <?php
                    include("conn.php");

                    $search_key = "";

                    if(isset($_POST['searchBtn'])){
                        $search_key = $_POST['search_key'];
                    }
                
                    $result=mysqli_query($conn,"SELECT * FROM employee WHERE employee_name LIKE '%$search_key%' ORDER BY employee_id");
                ?>
                <div class = "reservation_content">
                    <table class= "reservation_table">
                        <tr>
                            <th>ID</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Conduct</th>
                            <th>Delete</th>
                        </tr>

                        <?php
                            while($row = mysqli_fetch_array($result)) {
                                $edit = "<a href=\"Manage_staff.php?id=$row[employee_id]\">";
                                echo $edit;
                                echo "<tr>";
                                echo "<td>".$row['employee_id']."</td>";
                                echo '<td><img class="profile_image" src="data:image;base64,'.base64_encode($row['employee_profilepic']).'" alt = "Profile"></td>';
                                echo "<td>".$row['employee_name']."</td>";
                                if($row['position'] == "manager"){
                                    echo "<td>Manager</td>";
                                }
                                else if($row['position'] == "receptionist"){
                                    echo "<td>Receptionist</td>";
                                }
                                else{
                                    echo "<td>Cleaner</td>";
                                }
                                echo "<td>".$row['employee_email']."<BR>".$row['employee_phone_no']."<BR></td>";
                                echo "<td><a class = 'button' href=\"delete_staff.php?id=$row[employee_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
                                <a class = 'button' href=\"Manage_staff.php?id=$row[employee_id]\">Detail</a></td>";
                                echo "</tr>";
                                echo "</a>";
                            }
                        ?>
                    </table>
                </div>
            
            </div>
        </div>
    </body>
</html>