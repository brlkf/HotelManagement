<!DOCTYPE html>
<html>
<?php
    include "recep-session.php"
?>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
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

    h2,h3{
        font-family:"Montserrat",sans-serif;
        font-size:20px
    }

    body{
        background-color : 	rgb(220,220,220);
    }

    .table{
        border-collapse: collapse;
        font-size: 0.9em;
        font-family: sans-serif;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border-radius: 5px 5px 0 0;
        overflow: hidden; 
        align: center;
        width: 100%;
    }
    

    .table th, td{
        padding : 12px 15px;
    }

    .table tbody tr{
        border-bottom: 1px solid #dddddd;
    }
    .table tbody tr:nth-of-type(odd){
    background-color: white; 
    }
    .table tbody tr:nth-of-type(even){
    background-color: #f3f3f3; 
    }

    .table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
    }

    .table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

    .table_content{
        display : inline-flex;


        
    }

    .wordalign{
        padding : 20px;
    }

    .contain{
        justify-content:space-around;
        align-items : center;
        display: flex;
        height:500px;
        margin:0;
        padding-right: 150px;
        top:0;
        left: 0;
        width:100%;
        padding-left: 150px;
}

    </style>
    <title>document</title>
</head>
<body>
    <?php 
        include "side.php";
    ?>

    <div id = "content-text" class="content-text">
        <?php 
            include "top_nevi.php";
        ?>
    
    <div class="wordalign">
        <h2>Welcome back, <?php
        include "conn.php";
        $employee_id = $_SESSION['mySession'];
        $query = "SELECT * FROM employee WHERE employee_id =$employee_id";
        $result = mysqli_query($conn,$query); 
    
         while($row=mysqli_fetch_array($result)){
             echo $row['employee_name'];
         }
             ?></h2>
    </div>
    <div class = contain>
    <div class = table_content>
        <?php
        include "conn.php";
        $employee_id = $_SESSION['mySession'];
        $query = "SELECT * FROM employee WHERE employee_id =$employee_id";
        $result=mysqli_query($conn,$query);
    
         while($row=mysqli_fetch_array($result)){
            if ($row['employee_gender']=="male"){
                $gender_icon = "16-512-modified.png";
            }
            else if ($row['employee_gender']=="female"){
                $gender_icon = "girl.png";
            }
            $data='<div><img src="'.$gender_icon.'" width="400"></div>';
            echo $data;
            
        }
        ?>
    </div>
    <div class = table_content>
    <table  class = table align = center >
    
        <tbody>
            <?php 
            $employee_id = $_SESSION['mySession'];
            include "conn.php";
            $query= "SELECT * FROM employee WHERE employee_id = $employee_id";
            $result = mysqli_query($conn,$query); 
            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
            
                echo "<td>";          
                echo "Employee ID";
                echo "</td>";
                echo "<td>";  
                echo ": ";
                echo $row['employee_id'];
                echo "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>";
                echo "Name: ";
                echo "</td>";
                echo "<td>";
                echo ": ";
                echo $row['employee_name'];
                echo "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>";
                echo "Gender: ";
                echo "</td>";
                echo "<td>";
                echo ": ";
                echo $row['employee_gender'];
                echo "</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>";
                echo "Email: ";
                echo "</td>";
                echo "<td>";
                echo ": ";
                echo $row['employee_email'];
                echo "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>";
                echo "Position: ";
                echo "</td>";
                echo "<td>";
                echo ": ";
                echo $row["position"];           
                echo "</td>";
                echo "</tr>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>";
                echo "Phone number: ";
                echo "</td>";
                echo "<td>";
                echo ": ";
                echo $row["employee_phone_no"];           
                echo "</td>";
                echo "</tr>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>";
                echo "Address: ";
                echo "</td>";
                echo "<td>";
                echo ": ";
                echo $row["employee_address"];           
                echo "</td>";
                echo "</tr>";
                echo "</tr>";


            
        }
                mysqli_close($conn);//to close the database connection
            ?>
        </tbody>
    </div>
    </table>
    </div>
    </div>
    </div>
</body>
</html>