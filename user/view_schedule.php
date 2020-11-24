<?php
    include('header.php');
?>

//css

<style>

table

{

border-style:solid;

border-width:2px;

border-color:pink;

}

</style>

</head>

<body bgcolor="#EEFDEF">

<?php
session_start();
include("../dbconnect.php");
 

//$result = mysql_query("SELECT * FROM trains");
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
$sql="SELECT * FROM trains";

$result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);
 

echo "<table border='1'>

<tr>

<th>Train no.</th>

<th>Name</th>

<th>Source</th>

<th>Destination</th>

<th>Date</th>

<th>Available_sl</th>

<th>Available_ac</th>

</tr>";

 

while($row = mysqli_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['Train_no'] . "</td>";

  echo "<td>" . $row['name'] . "</td>";

  echo "<td>" . $row['src'] . "</td>";

  echo "<td>" . $row['dest'] . "</td>";

  echo "<td>" . $row['date'] . "</td>";

  echo "<td>" . $row['avail_sl'] . "</td>";

  echo "<td>" . $row['avail_ac'] . "</td>";

  echo "</tr>";

  }

echo "</table>";

 

?>
<?php
    include('footer.php');
?>
