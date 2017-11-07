<?php
/*
	file:	admin/deleteperson.php
	desc:	Reads personID from get-list and deletes that record
			from database table person. Removes all placements from
			placement-table with that personID.
*/
if(!empty($_GET['communityID'])) $communityID=$_GET['communityID'];
else header('location:index.php?page=');
include('../db.php');
$sql="DELETE FROM community WHERE communityID=$communityID";
$conn->query($sql);
/*$sql="DELETE FROM placement WHERE companyID=$companyID"; */
$conn->query($sql);
header('location:index.php?page=community');
?>