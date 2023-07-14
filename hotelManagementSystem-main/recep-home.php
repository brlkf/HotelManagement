<html>
     <?php
      include "recep-session.php";
    ?>
     <head>
    <meta charset="UCF-8">
            <meta name="viewport" content=" width=device width, initial-scale=1.0">
            <title> Home </title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script type="text/javascript" src="action.js"></script>
           
            <style>
                *{
                    margin: 0px;
                    padding:0px;
                    box-sizing:border-box; 
                            
                    }
                .button{
                    padding:10px 20px;
                    text-decoration: none;
                    color: white;
                    background-color: black;
                    
                    
                }
                .home_page_sec{
                   
                    display:flex;
                    justify-content: center;
                    align-items: center;
                }
                .content-text{
                    margin-top:0px;
                    margin-left:0px;
                    padding-bottom:50px;
                }


                #content-text{
                    transition: all .5s;
                }

                .profile_background{
                    width:100%;
                    background:linear-gradient(rgba(0,0,0,0.35),rgba(0,0,0,0.25)), url(beach-house.jpg) no-repeat center;
                    
                    background-size: cover;
                    height: 550px;
                    
                    align-items: center;
                    text-align:center

                    
                    
                }
                

                @keyframes home_animation {
                    from {colour:white;}
                    to {
                    color:black;}
                    }

                h1{
                    font-family:"Lucida Handwriting";
                    padding-top:200px;
                    color:white;
                    animation-name: home_animation;
                    animation-duration: 4s;
                    font-size:60px
                    
                }
                .button {
                   
                    border-radius: 20px;
                    background-color: rgb(4, 7, 32);
                    border: none;
                    color: #FFFFFF;
                    text-align: center;
                    font-size: 20px;
                    padding: 20px;
                    width: 280px;
                    transition: all 0.5s;
                    cursor: pointer;
                    margin: 5px;
                    }



                    .button span {
                    cursor: pointer;
                    display: inline-block;
                    position: relative;
                    transition: 0.8s;
                    }

                    .button span:after {
                    content: '\00bb';
                    position: absolute;
                    opacity: 0;
                    top: 0;
                    right: -20px;
                    transition: 0.8s;
                    }

                    .button:hover span {
                    padding-right: 25px;
                    }

                    .button:hover span:after {
                    opacity: 1;
                    right: 0;
            }
            .button_content{
                padding-top:50px;
            }

            .scroll-content {
                width: 100%;
                height: 500px;
                scroll-behavior: smooth;
                
                }

                .attendance-page {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
                background-colour:black;
                text-align:center
                }

                .sign-in-button {
                   
                   border-radius: 20px;
                   background-color: darkgrey;
                   border: none;
                 
                   text-align: center;
                   font-size: 20px;
                   padding: 20px;
                   width: 280px;
                   transition: all 0.5s;
                   cursor: pointer;
                   margin: 5px;
                   margin-left:50px;
                   margin-top:50px;
                  
                   
                   
                   }

                   .sign-out-button {
                   
                   border-radius: 20px;
                   background-color: darkgrey;
                   border: none;
                  
                   text-align: center;
                   font-size: 20px;
                   padding: 20px;
                   width: 280px;
                   transition: all 0.5s;
                   cursor: pointer;
                   margin: 5px;
                   margin-top:50px;
                   margin-left:50px;
                   
                   
                   }

                   .attendancebutton{
                    text-decoration: none; 
                     color: white;
                   }

               .button-content{
                   margin-top:100px;
                  
                   padding-top:100px;
                   padding-bottom:100px;
                   padding-left:400px;
                   padding-right:350px;
                   align-items: center;
                justify-content: center;
                border-radius:25px;
                background:linear-gradient(rgba(0,0,0,0.35),rgba(0,0,0,0.25)), url(leaf.jpg) no-repeat center;
                    
                background-size: cover;
                   
                  
               }

                h2{
                    font-family:"Lucida Handwriting";
                    
                    color:black;
                    font-size:40px
                }

            </style>
           
    </head>
    <body style="background-color:rgb(220,220,220)">
    
        <!---side-navi --->
        <?php
        include "recep-sidenavi.php"
        ?>
        
            <div id = "content-text" class="content-text">
            <?php
            include "recep-topnavi.php";
            ?>
            
               <div class = profile_background>
                    <div class = profile_background_text>
                    <h1>
                    <?php
                    
                     include "conn.php";
                     $employee_id = $_SESSION['mySession'];
                     $query= "SELECT * FROM employee WHERE employee_id = $employee_id";
                     $result = mysqli_query($conn, $query);
                     while ($row=mysqli_fetch_assoc($result)) {

                        date_default_timezone_set('Asia/Kuala_Lumpur');

                        // 24-hour format of an hour without leading zeros (0 through 23)
                        $Hour = date('G');
                            $employeename = $row['employee_name'];
                        if ( $Hour >= 5 && $Hour <= 11 ) {
                            $gr = "Good Morning";
                            $greetingresult = $gr . ',' . $employeename;
                            echo $greetingresult;
                        } else if ( $Hour >= 12 && $Hour <= 18 ) {
                            $gr = "Good Afternoon";
                            $greetingresult = $gr . ',' . $employeename;
                            echo $greetingresult;
                        } else if ( $Hour >= 19 || $Hour <= 4 ) {
                            $gr = "Good Evening";
                            $greetingresult = $gr . ',' . $employeename;
                            echo $greetingresult;
                        }
                        mysqli_close($conn);
                    }
                ?>
                </h1>
                <div class = button_content>
                <a class="button" href="#attendancepage"><span> SIGN  &nbsp; ATTENDANCE </span></a>
                </div>
                    </div>
            </div>
            <div class="scroll-content">
                <div class="attendance-page" id="attendancepage">
                    
                    <div class = button-content>
                        <h2> Glad To See You...</h2>
                    <div class =sign-in-button>
                    <a class="attendancebutton" href="recep-update-attendance.php"> SIGN  &nbsp; IN</a>
                    </div>
                    <div class = sign-out-button>
                    <a class="attendancebutton" href="recep-update-attendance.php"> SIGN  &nbsp; OUT </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>