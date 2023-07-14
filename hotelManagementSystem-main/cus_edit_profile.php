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

    .table th{
        align:center;

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


    .view_ticket{
        width: 80%;
        height: 50px;
        border: 1px solid;
        background:#2691d9 ;
        border-radius: 20px;
        font-size: 13px;
        color: #e9f4fb;
        font-weight: 700;
        cursor: pointer;
        outline: none;
        transition: 5s;
        box-shadow: inset 0 0 0 0;
    }

    .view_ticket:hover{
        box-shadow: inset 400px 0 0 0 #2691d9;
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

    .type{
        text-align:center;
        height:30px;
        width:125px;
        border:1px solid;
        border-radius:5px;
        margin-right:70px;
    }


    .right h3{
        margin-right:70px;
    }

    .left h3{
        margin-left:50px;
    }

    input[type="file"] {
    display: none;
}

    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        color:white;
        border-radius:5px;
    }

    
    </style>
    <title>document</title>
</head>
<body>
    <?php
    include "cus_header(log in).php" 
    ?>   
    <table class = table align = center>
    <form action="cus_update_profile.php" method= "POST" enctype="multipart/form-data">
        <thead>
        <input type="hidden" name="password" value="<?php $password=$_SESSION['mySession'];
        echo $password;?>">
          <tr><td  colspan="3" align="center"><div>
              <?php 
              include "conn.php";
              $name= $_SESSION['mySession'];
              $query ="SELECT * FROM registered_customer WHERE customer_password = '$name'";
              $result=mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($result)) {
                  $pic='<img class ="profile_image" src="data:image;base64,'.base64_encode($row['customer_profile_pic']).'" style="border-radius:50%;" width="150" height="150" alt = "Profile">';
                echo $pic;
                         
              ?></div><div>
         
          
          <label for="image" class ="custom-file-upload">
            <input type="file" name="profile_image" id="image">
                     Upload New Profile Picture</label>
         </div>
                </td></tr>
              
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
                    <input class="type" type="text" name="username" value=<?php echo $row['customer_name'] ?>>  
            </th>
            </tr>
            <tr>
                <th class="left">
                    <h3 >Customer Nationality</h3>
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
                <input class="type" type="tel" name="phone_no" pattern="[0]{1}[1]{1}[0-9]{8,9}" value=<?php echo $row['customer_phone_no']?>>
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
                <input class="type" type="email" name="email" value=<?php echo $row['customer_email']?>>
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
        <button name="submit" type="submit" class="b1">Confirm edit</button></form>&nbsp&nbsp<button class="b1" onclick="location.href='cus_profile.php'">Cancel Edit</button></div>
</body>

</html>