<?php
    include('header.php');
?>
    <!-- Above code is same as index.php
        Starting the code for admin login
    -->
<?php
    session_start();
    include("../dbconnect.php");
    if(isset($_POST["Submit"])){
        $tr_no=$_POST['train_no'];
        $tr_name = $_POST['train_name'];
        $src = $_POST['src'];
        $dest = $_POST['dest'];
        $tr_date=$_POST['train_date'];
        $ac_coach = $_POST['ac_coach'];
        $ac_seats = 24* $ac_coach;
        $sl_coach = $_POST['sleeper_coach'];
        $sl_seats = 18 * $sl_coach ;
        $tbl_name="trains";
        //echo $tr_date;
        //echo $_POST['train_date'];
        mysqli_select_db($conn,"$db_name")or die("cannot select DB");

        $sql = "INSERT INTO trains(Train_no,name,src,dest,date, sl_seats,ac_seats,avail_sl,avail_ac)
                VALUES ('$tr_no','$tr_name','$src','$dest','$tr_date','$sl_seats','$ac_seats','$sl_seats','$ac_seats')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        }
        else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    if(isset($_POST["Logout"])){
        session_unset();
        session_destroy();
        setcookie(PHPSESSID,session_id(),time()-1);
	    header("location:../index.php");
    }
 
    //$today = date("Y-m-d<br>", time());
	//echo $today;
?>


<div class="forms">
    <form action="admin_home.php" method="post">

        Train Number : <input type="number" name="train_no" placeholder = "Enter train number"><br>
        Name : <input type="text" name="train_name" placeholder = "Enter train name"><br>
        Source : <input type="text" name="src" placeholder = "Source"><br>
        Destination : <input type="text" name="dest" placeholder = "Enter Destination"><br>
        Train Date   : <input type="date" id = "train_date" name="train_date" value = '$today' min = '$today' placeholder = "Enter date of departure"><br>
        AC Coaches : <input type="number" name="ac_coach" placeholder = "Enter no. of AC coaches"><br>
        Sleeper Coaches : <input type="number" name="sleeper_coach" placeholder = "Enter no. of Slepper coaches"><br>
        <input type="submit" value="Submit" name="Submit">
    </form>

    <script> var today = new Date();
        
        
        today.setDate(today.getDate() + 7);
        var maxi = today;
        var dd = today.getDate() ;
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        today = yyyy+'-'+mm+'-'+dd; 
        document.getElementById("train_date").setAttribute("min", today);
        
        maxi.setDate(maxi.getDate() + 14);
        dd = maxi.getDate() ;
        mm = maxi.getMonth()+1; //January is 0!
        yyyy = maxi.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        maxi = yyyy+'-'+mm+'-'+dd; 

        document.getElementById("train_date").setAttribute("max", maxi);

    </script>

    <form action="admin_home.php" method = "post">
        <input type="submit" value="Logout" name="Logout">
    </form>

</div>


<?php
    include('footer.php');
?>
