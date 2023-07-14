<?php
      include "recep-session.php";
    ?>
<?php
  function updateSignOut(){
    
      include("conn.php");
      $employee_id = $_SESSION['mySession'];
      $attendance_id = getAttendanceId();
      date_default_timezone_set('Asia/Kuala_Lumpur');
      $current_date = date("Y-m-d");
      $current_time = date('H:i:s');
      if ($attendance_id == ""){
          $sqli = "INSERT INTO attendance (employee_id,work_date,sign_in_time)
                  VALUES ('$employee_id', '$current_date', '$current_time')";
                  $result=mysqli_query($conn,$sqli);
                  if (!$result) {
                      die('Error: ' . mysqli_error($conn));
                  }
                  else{
                      mysqli_close($conn);
                      echo '<script>alert("Sign-in successfully !");
                      window.history.go(-1);
                      </script>'; 
                          
                      
                  }
      }
      else if ($attendance_id != 0 ){
          $sign_in = mysqli_query($conn,"SELECT * FROM attendance WHERE attendance_id = $attendance_id");
          if (!$sign_in) {
              die('Error: ' . mysqli_error($conn));
          }
          else{
              $string = mysqli_fetch_array($sign_in);
          }
          $datetime1 = new DateTime($string["sign_in_time"]);
          $datetime2 = new DateTime($current_time);
          $diff = $datetime2->diff($datetime1);
          $hours = round($diff->s / 3600 + $diff->i / 60 + $diff->h + $diff->days * 24, 2);
          echo $hours;

          $employee = mysqli_query($conn,"SELECT salary_per_hour FROM employee WHERE employee_id = '$employee_id'");
          if (!$employee) {
              die('Error: ' . mysqli_error($conn));
          }
          else{
            $find_amount = mysqli_fetch_array($employee);
            $amount = $find_amount['salary_per_hour'];
            $sly = $amount * $hours;
            }

          $sql = "UPDATE attendance SET 
          sign_out_time = '$current_time',
          working_time = '$hours'
          WHERE attendance_id='$attendance_id';
          ";
          $salary ="INSERT INTO salary (employee_id,hand_out_date,amount)
          VALUES ('$employee_id',  '$current_date', '$sly')";
          
        $result1 = mysqli_query($conn,$salary);
        if (!$result1) {
            die('Error: ' . mysqli_error($conn));
            echo "1";
        }

        $result = mysqli_query($conn,$sql);
          if (!$result) {
              die('Error: ' . mysqli_error($conn));
              echo "2";
          }
          else{
              mysqli_close($conn);
              echo '<script>alert("Sign_Out successfully !");   
              window.history.go(-1);     
              </script>'; 
                   
          }
      }
  }
  
      function getAttendanceId(){
        $employee_id = $_SESSION['mySession'];
          include ("conn.php");
          $query = "SELECT * FROM attendance where employee_id = $employee_id;";
          $checking_result=mysqli_query($conn,$query);
          while($row = mysqli_fetch_array($checking_result)){
              if($row['sign_in_time'] != 0 and $row['sign_out_time'] == 0){
              $attendance_id= $row['attendance_id'];
              return $attendance_id;
              break;
              }
              }
              
              }
          
  updateSignOut();
?>