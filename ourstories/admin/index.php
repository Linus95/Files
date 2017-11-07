<?php
/*
	file:	admin/index.php
	desc:	Display the admin page if user is logged in
			checks that user is logged in and prevents 
			the page to be  saved any cache, proxy etc
*/
if(!empty($_GET['page'])) $page=$_GET['page'];else $page='';
session_start();
if(!isset($_SESSION['userID'])) header('location:../ourstories.php');
header('Cache-control:no-store,no-cache,must-revalidate');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>OurStories - Admin</title>
		<!-- Bootstrap core CSS -->
		<link href="./css/bootstrap.min.css" rel="stylesheet">
		<!--jQuery-->
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="js/myscript.js"></script>
	</head>
	<body>
		<div class="container">
		 <div class="panel panel-default container">
	     <h3>OurStories - Admin site</h3>
		  <p>
			<a href="index.php">Admin home</a>

			<a href="index.php?page=community">Communities</a>
			<a href="index.php?page=company">Companies</a>
			<a href="index.php?page=stories">Stories</a>
			<a href="index.php?page=activity">Activities</a>
			<a href="index.php?page=users">Users</a>
			<a href="index.php?page=chpwd"><?php echo $_SESSION['name']?></a>
			<a href="logout.php">Logout</a>
		  </p>
		 </div>
		
		<?php
			if($page=='') echo '<h2>Welcome to admin site</h2><p>This is the admin site for OurStories</p>';
			if($page=='chpwd') include('changepassword.php');
			if($page=='users') include('users.php');
			if($page=='editUser') include('editUser.php');
			if($page=='userFrm') include('userFrm.php');
			if($page=='community') include('community.php');
			if($page=='company') include('company.php');
			if($page=='stories') include('stories.php');
			if($page=='editStory') include('editStory.php');
			if($page=='editCompany') include('editCompany.php');
			if($page=='activity') include('activity.php');
			if($page=='editactivity') include('editactivity.php');
			if($page=='insertactivity') include('insertactivity.php');


		?>
		</div>
	</body>
</html>







