


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
if(!empty($_GET['companyID'])) $companyID=$_GET['companyID'];else $companyID=0;
include('../db.php');
$sql="SELECT * FROM company
	  WHERE company.companyID=$companyID";
$result=$conn->query($sql);  //runs the query in database
if($result->num_rows>0){
	$row=$result->fetch_assoc();
	echo '<h4>Edit company data</h3>';
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		$_SESSION['msg']='';
	}
	echo '<form action="updatecompany.php" method="post">
			<input type="hidden" name="companyID" value="'.$companyID.'" />
			Companyname <input type="text" name="companyname" value="'.$row['companyName'].'" /><br />
			Street<input type="text" name="street" value="'.$row['street'].'" /><br />
			Postnr <input type="number" name="postnr" value="'.$row['postnr'].'" /><br />
			City <input type="text" name="city" value="'.$row['city'].'" /><br />
			Description <input type="text" name="description" value="'.$row['description'].'" /><br />
			Website <input type="text" name="website" value="'.$row['website'].'" /><br />
			Facebook <input type="text" name="facebook" value="'.$row['facebook'].'" /><br />
			
			




			<input type="submit" value="Update company" />





		  </form>';
	



}else echo '<h4>No record found</h4>';
?>






