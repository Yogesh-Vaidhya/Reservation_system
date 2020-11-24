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
        $uname=$_POST['username'];
        $pass=$_POST['password'];
        $tbl_name="admin_table"; // Table name
        mysqli_select_db($conn,"$db_name")or die("cannot select DB");
        $sql="SELECT * FROM $tbl_name WHERE Username='$uname' and Password='$pass'";

        $result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);

        if(mysqli_num_rows($result) < 1)
        {
            echo " .... LOGIN TRY  ....";
            $_SESSION['error'] = "1";
            header("location:../index.php"); 
        }
        else
        {
            $_SESSION['name'] = $uname; 
            echo " ....   LOGIN  ....";
            echo $_SESSION['name'];
            header("location:admin_home.php");
        }
    }
?>

<div class="forms">
    <form action="login.php" method="post">
        User Name : <input type="text" name="username" placeholder="Enter username"><br>
        Password  :  <input type="text" name="password" placeholder="Enter password"><br>
        <input type="submit" value="Submit" name="Submit">
    </form>
</div>


<?php
    include('footer.php');
?>

