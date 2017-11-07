<?php
/*
	file:	admin/deleteactivity.php
	desc:	Reads personID from get-list and deletes that record
			from database table person. Removes all placements from
			placement-table with that personID.
*/
if(!empty($_GET['activityID'])) $activityID=$_GET['activityID'];
else header('location:index.php?page=');
include('../db.php');
$sql="DELETE FROM activity WHERE activityID=$activityID";
$conn->query($sql);
/*$sql="DELETE FROM placement WHERE companyID=$companyID"; */
$conn->query($sql);
header('location:index.php?page=activity');
?>