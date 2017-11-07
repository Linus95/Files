<?php
/*
	file:	admin/insert.php
	desc:	Reads form fields coming lastname, firstname, email
			salary and department. Inserts them into table person in db
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['activityName'])) $activityName=$_POST['activityName'];else $error=true;
if(!empty($_POST['activityDescription'])) $activityDescription=$_POST['activityDescription'];else $error=true;
if(!empty($_POST['activityKeyword'])) $activityKeyword=$_POST['activityKeyword'];else $error=true;


if(!$error){
	//here i could check that same values do not exist
	$sql="SELECT activityName,activityDescription,activityKeyword FROM activity WHERE activityName='$activityName'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		//already in database, do not insert!
		header('location:index.php?page=activity');
	}else{
	 //insert into database. Both into person and placement tables
	 $sql="INSERT INTO activity(activityName,activityDescription,activityKeyword)
		 VALUES('$activityName','$activityDescription','$activityKeyword')";
		 echo $sql;
	 $conn->query($sql);
	 //get the id of inserted record from auto-increment
	 
	}
$conn->close();
//header('location:index.php?page=company');
header('location:index.php?page=activity');
}
?>






