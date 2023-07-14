<!DOCTYPE html>
    <html lang = "en">
        <head>
            <meta charset="UCF-8">
            <meta name="viewport" content=" width=device width, initial-scale=1.0">
            <title> Document </title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script type="text/javascript" src="action.js"></script>
            <style>
                .top-navi{
                    justify-content: space-between;
                    align-items: center;
                    height:50px;
                    background-color:#112d32;
                    margin:0;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                    border-collapse: collapse;
                   
                    top:0;
                    left: 0;
                    display:flex;
                    width:100%
                }

                .top-navi-links{
                    display:flex;
                    justify-content:space-around;
                    width: 200px;
                }

                .top-navi-links li{
                    list-style:none;
                    margin-left:50px;
                    color:white
                }

                .top-navi-heading{
                    color:white;
                    font-size:20px;
                    text-transform: uppercase;
                    letter-spacing: 5px;
                    font-family: "fantasy";
                    padding-left:50px;


                }

                .openSidebarBtn{
                    cursor: pointer;
                    border: none;
                    color:white;
                    left:30px;
                    font-size:40px;
                    padding: 0px 5px;
                    background:transparent;
                    font-size:20px;
                }

                .top_navi_sec{
                    display:inline-flex;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                    border-collapse: collapse;
                }

                .button{
                    padding:10px 20px;
                    text-decoration: none;
                    color: white;
                    display:flex;
                    background-color: black
                }

                
            </style>
        </head> 
        <body>
            <div class = "top-navi">
                <div class = "top_navi_sec">
                    <button class="openSidebarBtn" onclick="openSideBar()">☰</button>
                </div>
                <div class = "top_navi_sec">
                    <h2 class="top-navi-heading"> Blue Tears </h2>
                </div>
                <div class = "top_navi_sec">
                        <a class="button" href="recep-logout.php">LOGOUT</a>
                </div>
            </div>
        </body>
    </html>