<?php
/*
	file:	admin/insert.php
	desc:	Reads form fields coming lastname, firstname, email
			salary and department. Inserts them into table person in db
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['storyTitle'])) $storyTitle=$_POST['storyTitle'];else $error=true;
if(!empty($_POST['storyType'])) $storyType=$_POST['storyType'];else $error=true;
if(!empty($_POST['storyLink'])) $storyLink=$_POST['storyLink'];else $error=true;
if(!empty($_POST['storyKeywords'])) $storyKeywords=$_POST['storyKeywords'];else $error=true;
if(!empty($_POST['storyDescription'])) $storyDescription=$_POST['storyDescription'];
else $error=true;


if(!$error){
	//here i could check that same values do not exist
	$sql="SELECT storyTitle,storyType,storyLink,storyKeywords,storyDescription FROM story WHERE storyTitle='$storyTitle'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		//already in database, do not insert!
		header('location:index.php?page=story');
	}else{
	 //insert into database. Both into person and placement tables
	 $sql="INSERT INTO story(storyTitle,storyType,storyLink,storyKeywords,storyDescription)
		 VALUES('$storyTitle','$storyType','$storyLink','$storyKeywords','$storyDescription')";
		 echo $sql;
	 $conn->query($sql);
	 //get the id of inserted record from auto-increment
	 
	}
$conn->close();
//header('location:index.php?page=company');
header('location:index.php?page=story');
}
?>






