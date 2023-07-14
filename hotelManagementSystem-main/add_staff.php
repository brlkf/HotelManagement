<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Staff</title>
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
        <!-- Main -->
        <div>
            <div id = "staff">
                <div class = page_content>
                    <div class = "table_content">
                        <div>
                            <h2 class="table_tittle"> Add Staff </h2>
                        </div>
                    </div>
                </div>
                <div>
                    <form class = "edit_staff" method="post" enctype="multipart/form-data">
                        <div class="formleft">
                            <input type="hidden" name="id">
                            <br>
                            <div>
                                <img class ="profile_image" src="default_profile.jpg" alt = "Profile">
                                <label class="edit_profile">
                                    <input type="file" name="profile_image" value = "default_profile.jpg" >
                                    Edit Profile
                                </label>
                            </div>
                            <br>
                            <lable class = "lable">Employee Name :</lable><br>
                            <input class="input" type="text" name="employee_name" required = "required">
                            <br><br>
                            <lable class = "lable">Gender :</lable><br>
                            <div>
                                <input type="radio" name="gender"	
                                    value="male" required="required"> &nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="gender"
                                    value="female" required="required"> &nbsp;&nbsp;Female
                            </div>
                            <br>
                            <lable class = "lable">Position :</lable><br>
                                <select class="input" name="position" required = "required">
                                    <option value="">Position</option>
                                    <option value="1">Manager</option>
                                    
                                    <option value="2">Receptionist</option>
                                    
                                    <option value="3">Cleaner</option>
                                </select>
                            <br>
                            <lable class = "lable">Phone Number :</lable><br>
                            <input class="input" type="tel" name="phone_no" min = "0" required = "required">
                            <br>
                            <lable class = "lable">Email :</lable><br>
                            <input class="input" type="email" name="email" required = "required">
                        </div>
                        <div class="formright">
                            <br><br><br><br>
                            <lable class = "lable">Address :</lable>
                            <textarea class="input" name="address"></textarea>
                            <br>
                            <lable class = "lable">Password :</lable><br>
                            <input class="input" type="text" name="employee_password" required = "required">
                            <lable class="lable">Salary per Hour :</lable><br>
                            <input class="input" type="int" name="salary_per_hour" required = "required">
                            <lable class="lable">Working Days :</lable><br>
                            <input class="input" type="int" name="working_days" required = "required">
                            <lable class="lable">Working Hour :</lable><br>
                            <input class="input" type="int" name="working_hour" required = "required">
                            <input class = "buttonright" type="submit" id="save" name="save" value="Save">
                        </div>
                    </form>
                </div>
                <?php
                    if(isset($_POST['save'])) {
                        include("conn.php");

                        $image = $_FILES['profile_image']['tmp_name'];
                        $img = file_get_contents($image);
                        $sql = "INSERT INTO `employee` (`employee_name`, `employee_password`, 
                        `employee_gender`, `position`, `employee_phone_no`, 
                        `employee_email`, `employee_address`, `salary_per_hour`, `working_days`, 
                        `working_hour`,`employee_profilepic`)
                        VALUE ('$_POST[employee_name]','$_POST[employee_password]','$_POST[gender]',
                        '$_POST[position]','$_POST[phone_no]','$_POST[email]','$_POST[address]',
                        '$_POST[salary_per_hour]','$_POST[working_days]','$_POST[working_hour]',?)";

                        $stmt = mysqli_prepare($conn,$sql);
                        mysqli_stmt_bind_param($stmt,"s",$img);
                        mysqli_stmt_execute($stmt);
                        $check = mysqli_stmt_affected_rows($stmt);

                        if($check == 1){
                            echo "<script>alert('Staff detail edited ^^'); window.location.href='staff.php';</script>";
                            mysqli_close($conn);
                        }
                        else{
                            echo "Fail to upload";
                            die('Error: ' . mysqli_error($conn));
                        }
                    }
                    if (isset($_POST["back"])){
                        echo "<script>window.location.href='staff.php';</script>";
                    }
                ?>
            </div>  
        </div>
    </div>
</body>
</html>
