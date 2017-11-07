<?php
/*
	file:	admin/insert.php
	desc:	Reads form fields coming lastname, firstname, email
			salary and department. Inserts them into table person in db
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['communityName'])) $communityName=$_POST['communityName'];else $error=true;
if(!empty($_POST['country'])) $country=$_POST['country'];else $error=true;
if(!empty($_POST['description'])) $description=$_POST['description'];else $error=true;


if(!$error){
	//here i could check that same values do not exist
	$sql="SELECT communityName,country,description FROM community WHERE communityID='$communityID'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		//already in database, do not insert!
		header('location:index.php?page=community');
	}else{
	 //insert into database. Both into person and placement tables
	 $sql="INSERT INTO community(communityID,communityName,country,description)
		 VALUES('$communityID','$communityName','$country','$description')";
		 echo $sql;
	 $conn->query($sql);
	 //get the id of inserted record from auto-increment
	 
	}
$conn->close();
//header('location:index.php?page=company');
header('location:index.php?page=community');
}
?>






