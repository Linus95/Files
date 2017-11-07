<?php
/*
	file:	ourstories_example/admin/deleteUser.php
	desc:	Removes selected user from database
*/
if(empty($_POST)) header('location:index.php?page=users');
$error=false;
if(!empty($_POST['userID'])) $userID=$_POST['userID'];else $error=true;
if(!$error){
	include('../db.php');
	$sql="DELETE FROM user WHERE userID=$userID";
	$conn->query($sql);
	echo '{"Status":"OK"}';
}else echo '{"Status":"Can not remove"}';
?>