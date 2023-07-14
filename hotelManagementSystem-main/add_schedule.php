<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Schedule</title>
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

            <div>
                <div id = "staff">
                    <div class = page_content>
                        <div class = "table_content">
                            <div>
                                <h2 class="table_tittle"> Add Schedule </h2>
                            </div>
                        </div>
                    </div>
                <form class = "edit_schedule" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <br>
                    <lable class="lable">Work Date :</lable>&nbsp;
                    <input class="input" type="date" name="work_date" required = "required">
                    <br>
                    <lable class="lable">Start Time &nbsp;:</lable>&nbsp;
                    <input class="input" type="time" name="work_start_time" required = "required">
                    <br>
                    <lable class="lable">End Time &nbsp;&nbsp;:</lable>&nbsp;&nbsp;
                    <input class="input" type="time" name="work_end_time" required = "required">
                    <br>
                    <button class = "buttonleft" name="back">Back</button>
                    <input class = "buttonright" type="submit" id="save" name="save" value="Save">
                </form>

                <?php
                    if(isset($_POST['save'])) {
                        include("conn.php");
                        $id = intval($_GET['id']);
                        $sql = "INSERT INTO `schedule` (`employee_id`,`work_date`, `work_start_time`, `work_end_time`) 
                        VALUE ($id, '$_POST[work_date]', '$_POST[work_start_time]', '$_POST[work_end_time]');";

                        if (!mysqli_query($conn,$sql)){
                            die('Error: ' . mysqli_error($conn));
                        }
                        
                        else{
                            echo "<script>alert('Schedule edited ^^'); window.location.href='edit_schedule.php?id=$id';</script>";
                            mysqli_close($conn);
                        }

                    }
                    if (isset($_POST["back"])){
                    echo "<script>window.location.href='edit_schedule.php?id=$_POST[id]';</script>";
                    }
                ?>
            </div>

        </div>

    </body>
</html>