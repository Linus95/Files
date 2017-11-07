


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<?php
/*
	file:	admin/editperson.php
	desc:	Displays a form where person with given id can be 
			edited
*/
if(!empty($_GET['activityID'])) $activityID=$_GET['activityID'];else $activityID=0;
include('../db.php');
$sql="SELECT * FROM activity
	  WHERE activity.activityID=$activityID";
$result=$conn->query($sql);  //runs the query in database
if($result->num_rows>0){
	$row=$result->fetch_assoc();
	echo '<h4>Edit activity data</h3>';
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		$_SESSION['msg']='';
	}
	echo '<form action="updateactivity.php" method="post">
			<input type="hidden" name="activityID" value="'.$activityID.'" />
			activityName <input type="text" name="activityName" value="'.$row['activityName'].'" /><br />
			activityDescription<input type="text" name="activityDescription" value="'.$row['activityDescription'].'" /><br />
			activityKeyword <input type="text" name="activityKeyword" value="'.$row['activityKeyword'].'" /><br />
		

			<input type="submit" value="Update activity" />





		  </form>';
	



}else echo '<h4>No record found</h4>';
?>






