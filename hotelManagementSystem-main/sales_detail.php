<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales Report</title>
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
                            <h2 class="table_tittle"> Sales Report </h2>
                        </div>
                    </div>
                </div>
                <?php
                    include("conn.php");

                    $result=mysqli_query($conn,
                    "SELECT p.`payment_id`, p.`discount_applied`, bc.`booking_cart_id`,b.`booking_id`, r.`room_id`,r.`room_type`, b.`booking_start_date`, 
                    b.`booking_end_date`, b.`booking_start_time`, b.`booking_end_time`, r.`price_per_night`
                    FROM `payment` p INNER JOIN `booking_cart` bc
                    ON p.`booking_cart_id` = bc.`booking_cart_id`
                    INNER JOIN `booking` b
                    ON bc.`booking_id` = b.`booking_id`
                    INNER JOIN `room` r
                    ON b.`room_id` = r.`room_id`
                    GROUP BY p.`payment_id`
                    ORDER BY p.`payment_id`");
                ?>

                <div class = "reservation_content">
        
                    <table class= "reservation_table" >
                    <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Booking Cart ID</th>
                        <th>Booking</th>
                        <th>Room</th>
                        <th>Night</th>
                        <th>Price</th>
                    </tr>
                    <thead>

                    <tbody>
                    <?php
                        $totalall = 0;
                        if(isset($result)){
                            while($row = mysqli_fetch_array($result)) {
                                $startDate = new DateTime("$row[booking_start_date]");
                                $endDate = new DateTime("$row[booking_end_date]");

                                $difference = $endDate->diff($startDate);
                                $night = $difference->format('%d');
                                $price = $row['price_per_night'];
                                $discount = $row['discount_applied'];
                                $serviceTax = ($night * $price) * 0.1;
                                $total = ($night*$price)+$serviceTax-$discount ;

                                echo "<tr>";
                                echo "<td>".$row['payment_id']."</td>";
                                
                                echo "<td>".$row['booking_cart_id']."</td>";

                                echo "<td>".$row['booking_id']."</td>";

                                echo "<td>".$row['room_type']."</td>";

                                echo "<td>".$night."</td>";

                                echo "<td>".$total."</td>";
                                
                                echo "</tr>";

                                $totalall = $totalall + $total;
                            }
                        }
                        else{
                            echo "There is no attendance";
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th>Total :</th>
                        <th><?php echo $totalall ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>