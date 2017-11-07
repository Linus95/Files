


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
if(!empty($_GET['communityID'])) $communityID=$_GET['communityID'];else $communityID=0;
include('../db.php');
$sql="SELECT * FROM community
	  WHERE community.communityID=$communityID";
$result=$conn->query($sql);  //runs the query in database
if($result->num_rows>0){
	$row=$result->fetch_assoc();
	echo '<h4>Edit comminty data</h3>';
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		$_SESSION['msg']='';
	}
	echo '<form action="updatecommunity.php" method="post">
			<input type="hidden" name="communityID" value="'.$communityID.'" />
			CommunityName <input type="text" name="communityName" value="'.$row['communityName'].'" /><br />
			Country<input type="text" name="country" value="'.$row['country'].'" /><br />
			Description <input type="text" name="description" value="'.$row['description'].'" /><br />
			
	
			<input type="submit" value="Update community" />





		  </form>';
	



}else echo '<h4>No record found</h4>';
?>






