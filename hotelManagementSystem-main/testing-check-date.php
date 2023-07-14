<form class = "filter_part" method = "post">
    <div class  = "filter_part_sec">
    <input type = "date" name = "startdate" placeholder = "Please enter sd" ></input>
    </div>
    <div class = "filter_part_sec">
    <input type = "date" name = "enddate" placeholder = "Please enter ed" ></input>
   
    </div>
    <div class = "filter_part_sec">
    <input type = "text" name = "roomtype" placeholder = "Please enter room type" ></input>
   
    </div>
    <div class = "filter_part_sec">
        <button class="filterResultBtn" name="filterBtn" type="submit">Search</button>
    </div>
</form>
<?php
        include("conn.php");
        if(isset($_POST['filterBtn']))
        {
            $sd = $_POST['startdate'];
            $ed = $_POST['enddate'];
            $roomtype = $_POST['roomtype'];
            $allroom = array();
            $bookedroomcart = array();
            $matchedtyperoom =array();
            $query = "SELECT * FROM booking ;";
    
    $finding_result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($finding_result)){
            $bsd =$row['booking_start_date'];
            $bed =$row['booking_end_date'];
            if (($sd >= $bsd && $sd <= $bed) 
                    ||
                    // check clash for end date    
                    ($ed >= $bsd && $ed <= $bed)){
                    
                    // if clash then return crashed room id
                    array_push($bookedroomcart,$row['room_id'] );
                    
                } 
        } 
        echo "<pre>";
        print_r($bookedroomcart);
        echo "</pre>";
        $query1 = "SELECT * FROM room ;";
        $result1 = mysqli_query($conn,$query1);
        while($row=mysqli_fetch_array($result1)){
            
                array_push($allroom,$row['room_id'] );
            }
      
        echo "<pre>";
        print_r($allroom);
        echo "</pre>";
        echo "<pre>";
        $combinedtypeandbooked =array_merge($allroom,$bookedroomcart);
        print_r($combinedtypeandbooked);
        echo "</pre>";
        $allavailableroom = array_diff($combinedtypeandbooked, array_diff_assoc($combinedtypeandbooked, array_unique($combinedtypeandbooked)));
        echo "<pre>";
        print_r($allavailableroom);
        echo "</pre>";
        $query2 = "SELECT * FROM room ;";
        $result2 = mysqli_query($conn,$query2);
        while($row=mysqli_fetch_array($result2)){
            if ($row['room_type'] == $roomtype){
                array_push($matchedtyperoom,$row['room_id']);
            }
                 
            }
            echo "<pre>";
            print_r($matchedtyperoom);
           // echo "</pre>"; 
            //$combinedavailableandmatchedtype =array_merge($allavailableroom,$matchedtyperoom);     
            //echo "<pre>";
           // print_r($combinedavailableandmatchedtype);
            //echo "</pre>"; 
            $finalmatchedroom = array_intersect($allavailableroom,$matchedtyperoom);
            echo "<pre>";
            print_r($finalmatchedroom);
            echo "</pre>"; 
            foreach ($finalmatchedroom as $canbookroom) {
                echo $canbookroom . '<br>';
            }
    }
?>
