<?php
/*
	file:	admin/updateperson.php
	desc:	Updates person-table with given fields
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['companyID'])) $companyID=$_POST['companyID'];else $error=true;
if(!empty($_POST['companyname'])) $companyname=$_POST['companyname'];else $error=true;
if(!empty($_POST['street'])) $street=$_POST['street'];else $error=true;
if(!empty($_POST['postnr'])) $postnr=$_POST['postnr'];else $error=true;
if(!empty($_POST['city'])) $city=$_POST['city'];else $error=true;
if(!empty($_POST['description'])) $description=$_POST['description'];
else $error=true;
if(!empty($_POST['website'])) $website=$_POST['website'];
else $website=NULL;
if(!empty($_POST['facebook'])) $facebook=$_POST['facebook'];
else $facebook=NULL;


if(!$error){


	$sql="UPDATE company SET companyName='$companyname',street='$street',
		  postnr='$postnr',city='$city',description='$description',website='$website',facebook='$facebook'
		  WHERE companyID=$companyID";
		  
	$conn->query($sql);
	
	session_start();
	$_SESSION['msg']='<h5 class="alert alert-success">Updated!</h5>';
}else $_SESSION['msg']='<h5 class="alert alert-danger">Could not update!</h5>';
$conn->close();
header("location:index.php?page=company");	

?>






