<?php
/*
	file:	ourstories_example/admin/editUser.php
	desc:	Form to edit user
*/
if(!empty($_GET['userID'])) $userID=$_GET['userID'];else header('location:index.php?page=users');
include('../db.php'); //use the database connection from parent folder
$sql="SELECT level FROM user WHERE userID=".$_SESSION['userID'];
$result=$conn->query($sql);
if($result->num_rows>0){
	//Checking if admin user -> display links to edit/add users
	$row=$result->fetch_assoc();
	if($row['level']=='admin') $admin=true;else $admin=false;
}
$sql="SELECT * FROM user WHERE userID=$userID";
$result=$conn->query($sql);
if($result->num_rows>0){
	$row=$result->fetch_assoc();
	$email=$row['email'];
	$firstname=$row['firstname'];
	$lastname=$row['lastname'];
	$phone=$row['phone'];
	$level=$row['level'];
}else header('location:index.php?page=users');
$conn->close();
?>
<h4>Edit user</h4>
<?php 
if(!empty($_SESSION['msg'])){
	echo $_SESSION['msg'];
	$_SESSION['msg']='';
}
?>
<div class="row">
 <div class="col-sm-6">
  <form action="updateUser.php" method="post">
	<input type="hidden" name="userID" value="<?php echo $userID?>" />
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email?>" >
    </div>
    <div class="form-group">
      <label for="firstname">Firstname:</label>
      <input type="text" class="form-control" id="firstname" placeholder="Firstname" name="firstname" value="<?php echo $firstname?>">
    </div>
	<div class="form-group">
      <label for="lastname">Lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Lastname" name="lastname" value="<?php echo $lastname?>">
    </div>
	<div class="form-group">
      <label for="phone">Phone:</label>
      <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone" value="<?php echo $phone?>">
    </div>
	<?php 
	if($admin){
	?>
	<div class="form-group">
		<label for="level">Select user level:</label>
			<select class="form-control" id="level" name="level">
				<option value="admin" <?php if($level=='admin') echo 'selected'?>>admin</option>
				<option value="editor" <?php if($level=='editor') echo 'selected'?>>editor</option>
			</select>
	</div>
	<?php
	}
	?>
    <button type="submit" class="btn btn-default">Update</button>
  </form>
 </div>
 
  <?php
  if($_SESSION['userID']!=$userID){?>
  <div class="col-sm-6 well">
  <p></p>
  <p>
  Remove this user permanently:
  <form id="delusr">
	<input type="checkbox" id="remove" value="remove" />Yes, i agree.
	<input type="hidden" id="userID" value="<?php echo $userID?>" />
	<button type="submit" class="btn btn-default" id="rmvUsrBtn">Remove</button>
  </form>
  </p>
  </div>
  <?php
  }
  ?>
 
</div>