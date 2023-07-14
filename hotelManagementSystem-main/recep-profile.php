<!DOCTYPE html>
<html lang = "en">
    <?php
    include "recep-session.php"
    ?>
    <head>
    <meta charset="UCF-8">
        <meta name="viewport" content=" width=device width, initial-scale=1.0">
        <title> Personal Salary</title>
        <script type="text/javascript" src="action.js"></script>   
        <style>

                *{
                    margin: 0px;
                    padding:0px;
                    box-sizing:border-box; 
                            
                    }
                .content-text{
                    margin-top:0px;
                    margin-left:0px;
                    padding-bottom:50px;
                }


                #content-text{
                    transition: all .5s;
                }

                .profileContents{
                    display:flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-left:200px;
                    margin-top:100px;
                    margin-right:100px;
                }

                .profile_content1{
                    display:inline-flex;
                    padding-right:5px;
                    padding-left:100px
                }

                .profile_content2{
                    display:inline-flex;
                    padding-left:10px;
                    padding-right:100px
                }

               

                .admin_detail_table {
                    font-family: Arial, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                    text-align:center
                    }

                
                .admin_detail_table  td{
                    border: 1px solid #ddd;
                    padding: 8px;
                    height:50px
                    }

                .admin_detail_table  tr:nth-child(even){
                    background-color: white;
                }
                .admin_detail_table  tr:nth-child(odd){
                    background-color: rgb(240,248,255);
                }

                .admin_detail_table  tr:hover {
                    background-color: rgb(240,248,255);
                }

        </style>
    </head>
<body style="background-color:	rgb(220,220,220)";>
        <?php
            include "recep-sidenavi.php"
        ?>
    <div id = "content-text" class="content-text">
            <?php
                include "recep-topnavi.php";
            ?>
   
    <div class = "profileContents">
    <div class ="profile_content1">
        <?php
         $employee_id = $_SESSION['mySession'];
            include "conn.php";
            $query= "SELECT * FROM employee WHERE employee_id = $employee_id";
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
                  $employee_id = $_SESSION['mySession'];
                        include "conn.php";
                        $query = "SELECT * FROM employee WHERE employee_id =$employee_id";
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