<?php
/*
	file:	admin/updateperson.php
	desc:	Updates person-table with given fields
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['storyID'])) $storyID=$_POST['storyID'];else $error=true;
if(!empty($_POST['storytitle'])) $storyTitle=$_POST['storytitle'];else $error=true;
if(!empty($_POST['type'])) $storyType=$_POST['type'];else $error=true;
if(!empty($_POST['link'])) $storyLink=$_POST['link'];else $error=true;
if(!empty($_POST['keywords'])) $storyKeywords=$_POST['keywords'];else $error=true;
if(!empty($_POST['storydescription'])) $storyDescription=$_POST['storydescription'];else $error=true;


if(!$error){



	$sql="UPDATE story SET storyTitle='$storyTitle',storyType='$storyType',storyLink='$storyLink',
		  storyKeywords='$storyKeywords',storyDescription='$storyDescription'

		  WHERE storyID=$storyID";
	$conn->query($sql);
	echo $sql;

	$conn->query($sql);
	session_start();
	$_SESSION['msg']='<h5 class="alert alert-success">Updated!</h5>';
}else $_SESSION['msg']='<h5 class="alert alert-danger">Could not update!</h5>';
$conn->close();
header("location:index.php?page=stories");	

?>












