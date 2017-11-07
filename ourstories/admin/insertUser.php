<?php
/*
	file:	ourstories_example/admin/insertUser.php
	desc:	Inserts user into db
*/

if(empty($_POST)) header('location:index.php?page=users');
$error=false;
if(!empty($_POST['email'])) $email=$_POST['email'];else $error=true;
if(!empty($_POST['firstname'])) $firstname=$_POST['firstname'];else $error=true;
if(!empty($_POST['lastname'])) $lastname=$_POST['lastname'];else $error=true;
if(!empty($_POST['phone'])) $phone=$_POST['phone'];else $error=true;
if(!empty($_POST['level'])) $level=$_POST['level'];else $error=true;
if(!empty($_POST['passwd'])) $passwd=$_POST['passwd'];else $error=true;
if(!$error){
	$passwd=password_hash($passwd,PASSWORD_DEFAULT);
	include('../db.php');
	$sql="INSERT INTO user(email,firstname,lastname,phone,level,password) VALUES('$email','$firstname','$lastname','$phone','$level','$passwd')";
	$conn->query($sql);
	echo '{"Status":"OK"}';
}else echo '{"Status":"Missing fields"}';
?>