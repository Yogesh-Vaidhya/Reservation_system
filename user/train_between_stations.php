<?php include('header.php'); 
require '../dbconnect.php';
session_start();
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if(isset($_POST['submit']))
{ 
	$src  = test_input($_POST['source_stn']);
    $dest = test_input($_POST['destination_stn']);	
    	 


    // $statement = $db->prepare("SELECT * FROM trains WHERE Start=? AND End=? ");
	// $statement->execute(array($source_stn , $destination_stn));

    mysqli_select_db($conn,"$db_name")or die("cannot select DB");
    $sql="SELECT * FROM trains WHERE src = '$src' AND dest = '$dest' ";

    $result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);

?>
			  <div class="col-md-12 forminput">
			<table class="table tablebg">
					<tr>
						<th>Train Number</th>
						<th>Train Name</th>
                        <th>Date</th>
						<th>Source Station</th>
						<th>Destination Station</th>
                        <th>Available sleeper</th>
                        <th>Available AC</th>
					</tr>
					
<?php 
	// $result = $statement->fetchAll(PDO::FETCH_ASSOC);
	while($row = mysqli_fetch_array($result)) { 

?>
					<tr>
						<td><?php echo $row['Train_no'] ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['date'] ?></td>
						<td><?php echo $row['src'] ?></td>
						<td><?php echo $row['dest'] ?></td>
                        <td><?php echo $row['avail_sl'] ?></td>
                        <td><?php echo $row['avail_ac'] ?></td>
					</tr>
<?php } ?>
				</table>
				
<?php 
	} else {  
?>
				<form class="form-horizontal" style="margin-top:300px;margin-left:50px;" action="" method="post">
				  <div class="form-group">
					  <label class="col-sm-2 for="sel1">Source Station</label>
					  <div class="col-sm-7">
					  <select class="form-control forminp" id="sel1" name="source_stn">
					    <option value="">Select Station ....</option>
					  
					  <?php

						// $statement = $db->prepare("SELECT DISTINCT Start FROM  trains");
						// $statement->execute(array());
                        // $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        mysqli_select_db($conn,"$db_name")or die("cannot select DB");
                        $sql= "SELECT DISTINCT src FROM trains ";
                        $result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);

							foreach ($result as $row) {
						?>
							<option value="<?php echo $row['src']; ?>"><?php echo $row['src'];?></option>
						<?php
								}

						?>
						</select>
						</div>
					</div>
				  <div class="form-group">
					  <label class="col-sm-2 for="sel1">Destination Station</label>
					  <div class="col-sm-7">
					  <select class="form-control forminp" id="sel1" name="destination_stn">
					    <option value="">Select Station ....</option>
					  
					  <?php

						// $statement = $db->prepare("SELECT DISTINCT End FROM  trains");
						// $statement->execute(array());
                        // $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        mysqli_select_db($conn,"$db_name")or die("cannot select DB");
                        $sql= "SELECT DISTINCT dest FROM trains ";
                        $result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);

							foreach ($result as $row) {
						?>
							<option value="<?php echo $row['dest']; ?>"><?php echo $row['dest'];?></option>
						<?php
								}

						?>
						</select>
						</div>
					</div>
				  <div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
					  <a><input type="submit" value="Submit" name="submit" /></a>
					</div>
				  </div>
				</form>
<?php  } ?>
			  </div>
<?php include('../footer.php'); ?>
 
