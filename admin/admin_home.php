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
        $tr_date=$_POST['train_date'];
        $ac_coach = $_POST['ac_coach'];
        $sleeper_coach = $_POST['sleeper_coach']; 
        $tbl_name="trains";
        echo $tr_date;
        echo $_POST['train_date'];
        mysqli_select_db($conn,"$db_name")or die("cannot select DB");
        
        $sql = "INSERT INTO trains (Train_num, train_date, sl_seats,ac_seats,avail_sl,avail_ac)
                VALUES ('$tr_no','$tr_date','18*$sleeper_coach','24*$ac_coach','18*$sleeper_coach','24*$ac_coach')";

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

?>

<div class="forms">
    <form action="admin_home.php" method="post">
        Train Number : <input type="number" name="train_no" placeholder = "Enter train number"><br>
        Train Date   : <input type="date" name="train_date" placeholder = "Enter date of departure"><br>
        AC Coaches : <input type="number" name="ac_coach" placeholder = "Enter no. of AC coaches"><br>
        Sleeper Coaches : <input type="number" name="sleeper_coach" placeholder = "Enter no. of Slepper coaches"><br>
        <input type="submit" value="Submit" name="Submit">
    </form>

    <form action="admin_home.php" method = "post">
        <input type="submit" value="Logout" name="Logout">
    </form>

</div>


<?php
    include('footer.php');
?>

