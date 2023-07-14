<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Schdedule</title>
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

            <div id = "staff">
                <?php
                    include("conn.php");
                    $id = intval($_GET['id']);
                    $result = mysqli_query($conn,"SELECT * FROM schedule WHERE schedule_id=$id");
                    while($row = mysqli_fetch_array($result))
                    {
                ?>

                <div class = page_content>
                    <div class = "table_content">
                        <div>
                            <h2 class="table_tittle"> Edit Schdedule </h2>
                        </div>
                    </div>
                </div>
                <form class = "edit_schedule" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['schedule_id'] ?>">
                    <br>
                    <lable class="lable">Work Date :</lable><br>
                    <input class="input" type="date" value = "<?php echo $row["work_date"] ?>" name="work_date" required = "required">
                    <br>
                    <lable class="lable">Start Time :</lable><br>
                    <input class="input" type="time" value = "<?php echo $row["work_start_time"] ?>" name="work_start_time" required = "required">
                    <br>
                    <lable class="lable">End Time :</lable><br>
                    <input class="input" type="time" value = "<?php echo $row["work_end_time"] ?>" name="work_end_time" required = "required">
                    <br>
                    <button  class="buttonleft" name="back">Back</button>
                    <input  class="buttonright" type="submit" id="save" name="save" value="Save">
                </form>

                <?php
                    $employeeID =  $row["employee_id"];
                    }
                    mysqli_close($conn);
                    if(isset($_POST['save'])) {
                        include("conn.php");
                
                        $sql = "UPDATE `schedule` SET 
                        `work_date`='$_POST[work_date]',
                        `work_start_time`='$_POST[work_start_time]',
                        `work_end_time`='$_POST[work_end_time]'
                
                        WHERE `schedule_id`='$_POST[id]';";

                        if (!mysqli_query($conn,$sql)){
                            die('Error: ' . mysqli_error($conn));
                        }
                        
                        if (mysqli_query($conn, $sql)){
                            echo "<script>alert('Schedule edited ^^'); window.location.href='edit_schedule.php?id=$employeeID';</script>";
                            mysqli_close($conn);
                        }

                    }
                    if (isset($_POST["back"])){
                        echo "<script>window.location.href='edit_schedule.php?id=$employeeID';</script>";
                        }
                ?>
            </div>

        </div>
    </body>
</html>