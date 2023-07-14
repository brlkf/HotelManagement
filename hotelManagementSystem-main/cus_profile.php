<!DOCTYPE html>
<html>
<head>
    <?php include "cus_session.php"?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link  rel="stylesheet">
    <style>
        body{
                margin:0;
                background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),
                url("Hotel2.png");
                background-repeat: no-repeat;
                background-size: 1600px 800px;
            }

    h2,h3{
        font-family:Times New Roman;
        font-size:16px;
        color:black;
    }

    .table{
        table-layout:fixed;
        border-collapse: collapse;
        font-size: 0.9em;
        font-family: sans-serif;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border-radius: 25px;
        overflow: hidden; 
        align: center;
        width: 40%;
    }
    
    .table thead tr{
        height:200px;
    background-color: rgba(56, 56, 56, 0.66);
    
    text-align: left;
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

    i{
        color:red;
        font-size:20px
    }
    .wordalign{
        display:flex;
        margin-left:540px
    }

    .b1{
        height:50px;
        width:300px;
        font-size: 20px;
        border-radius: 25px;
        border: 0px;
        background:#383838;
        color:white;
    }

    .b1:hover{
        height:50px;
        width:300px;
        font-size: 20px;
        border-radius: 25px;
        border: 0px;
        background:rgba(255,255,255,1);
        color:black;
    }

    .right h3{
        margin-right:70px;
    }

    .left h3{
        margin-left:50px;
    }
    </style>
    <title>document</title>
</head>
<body>
    <?php
    include "cus_header(log in).php" 
    ?>   
    <table class = table align = center>
        <thead>
          <tr><td  colspan="3" align="center">
              <?php 
              include "conn.php";
              $name= $_SESSION['mySession'];
              $query ="SELECT * FROM registered_customer WHERE customer_password = '$name'";
              $result=mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($result)) {
                echo '<div style="float:center; border:no-border #000 solid; padding:5px; margin: 5px;">';
                echo '<img src="data:image/jpg;base64,' . base64_encode($row['customer_profile_pic']) .'"  width="150" height="150" style="border-radius:50%;"/><br>';
                echo '</div>'; 
                mysqli_close($conn);
                //echo '<img class ="profile_image" width="150" height="150" style="border-radius:50%;" src="'.$row['customer_profile_pic'].'" alt = "Profile">';
              ?> 
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="left">
                    <h3>Customer Name</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th class="right">
            <?php
            echo "<h3>";
            echo $row['customer_name'];
            echo "</h3>";
            ?>
            </th>
            </tr>
            <tr>
                <th class="left">
                    <h3>Customer Nationality</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th class="right">
            <?php
            echo "<h3>";
            echo $row['customer_nationality'];
            echo "</h3>";
            
            ?>
            </th>
            <tr>
                <th class="left">
                    <h3>Phone Number</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th class="right">
                <?php
                    echo "<h3>";
                    echo $row['customer_phone_no'];
                    echo "</h3>";
                ?>
                </th>
            </tr>
            <tr>
                <th class="left">
                    <h3>Email</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th class="right">
                <?php  
                echo "<h3>";
                echo $row['customer_email'];
                echo "</h3>";?>
                </th>
            </tr>
            <tr>
                <th class="left">
                    <h3>IC Number</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th class="right">
                <?php  
               echo "<h3>";
               echo $row['ic_no'];
               echo "</h3>";
               ?>
            
                </th>
            </tr>

            <tr>
                <th class="left">
                    <h3>Passport Number</h3>
                </th>
                <th>
                    <h3>:</h3>
                </th>
                <th class="right">
                <?php  
               echo "<h3>";
               echo $row['passport_no'];
               echo "</h3>";}
               ?>
                </th>
            </tr>
        </table><br><br><div align="center">
        <button class="b1" onclick="location.href='cus_edit_profile.php'">Edit</button></div>
</body>
</html>