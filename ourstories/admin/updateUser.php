<?php
/*
	file:	ourstories_example/admin/updateUser.php
	desc:	Updates the user in db
*/
if(empty($_POST)) header('location:index.php?page=users');
else{
	$userID=$_POST['userID'];
	$email=$_POST['email'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$phone=$_POST['phone'];
	$level=$_POST['level'];
	include('../db.php');
	$sql="UPDATE user SET email='$email', firstname='$firstname', lastname='$lastname',phone='$phone',level='$level' ";
	$sql.="WHERE userID=$userID";
	//echo $sql;
	$conn->query($sql);
	session_start();
	$_SESSION['msg']='<p class="alert alert-success">Updated!</p>';
	header("location:index.php?page=editUser&userID=$userID");
}
?>