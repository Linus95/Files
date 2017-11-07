<?php
/*
		file: 	ourstories_example/admin/users.php
		desc:	Displays the list of users in db
*/
include('../db.php'); //use the database connection from parent folder
$sql="SELECT level FROM user WHERE userID=".$_SESSION['userID'];
$result=$conn->query($sql);
if($result->num_rows>0){
	//Checking if admin user -> display links to edit/add users
	$row=$result->fetch_assoc();
	if($row['level']=='admin') $admin=true;else $admin=false;
}
?>
<h4>Users</h4>
<p>Here are the users. Every user can edit their own data. Admins can edit everyones data.</p>
<p><a href="index.php?page=userFrm">Add user <span class="glyphicon glyphicon-user"></span></a></p>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>UserID</th><th>Email</th><th>Firstname</th><th>Lastname</th><th>Phone</th><th>Level</th><th>Image</th><th>Update</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql="SELECT * FROM user ORDER BY lastname, firstname";
			$result=$conn->query($sql);  //runs the query in database
			while($row=$result->fetch_assoc()){
				echo '<tr>';
				echo '<td>'.$row['userID'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				echo '<td>'.$row['firstname'].'</td>';
				echo '<td>'.$row['lastname'].'</td>';
				echo '<td>'.$row['phone'].'</td>';
				echo '<td>'.$row['level'].'</td>';
				echo '<td><img src="./images/'.$row['image'].'"  class="media-object" style="width:50px" /></td>';
				//edit links, if administrator
				if($admin OR(!$admin AND $_SESSION['userID']==$row['userID'] )){
					echo '<td><a href="index.php?page=editUser&userID='.$row['userID'].'"><span class="glyphicon glyphicon-pencil"></span></a></td>';
				}				
				echo '</tr>';
			}
			$conn->close();
		?>
	</tbody>
</table>