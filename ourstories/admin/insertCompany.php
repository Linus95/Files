<?php
/*
	file:	admin/insert.php
	desc:	Reads form fields coming lastname, firstname, email
			salary and department. Inserts them into table person in db
*/
if(empty($_POST)) header('location:index.php');
include('../db.php');
$error=false;
if(!empty($_POST['companyName'])) $companyName=$_POST['companyName'];else $error=true;
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
	//here i could check that same values do not exist
	$sql="SELECT companyName,street,city,website FROM company WHERE companyName='$companyName'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		//already in database, do not insert!
		header('location:index.php?page=company');
	}else{
	 //insert into database. Both into person and placement tables
	 $sql="INSERT INTO company(companyName,street,postnr,city,description,website,facebook)
		 VALUES('$companyName','$street','$postnr','$city','$description','$website','$facebook')";
		 echo $sql;
	 $conn->query($sql);
	 //get the id of inserted record from auto-increment
	 
	}
$conn->close();
//header('location:index.php?page=company');
header('location:index.php?page=company');
}
?>






