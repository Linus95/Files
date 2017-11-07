<?php
/*
	file:	ourstories_example/admin/editStory.php
	desc:	Form to edit story
*/
if(!empty($_GET['storyID'])) $storyID=$_GET['storyID'];else header('location:index.php?page=stories');
include('../db.php');
$sql="SELECT * FROM story WHERE storyID=$storyID";
$result=$conn->query($sql);
if($result->num_rows>0){
	$row=$result->fetch_assoc();
	$storyTitle=$row['storyTitle'];
	$storyDescription=$row['storyDescription'];
	$storyType=$row['storyType'];
	$storyKeywords=$row['storyKeywords'];
	$storyLink=$row['storyLink'];
}else header('location:index.php?page=users');

?>
<h4>Edit story</h4>
<div class="row">
 <div class="col-sm-6 well">
 <h5>Update the story data</h5>
 <form action="updateStory.php" method="post">
	<input type="hidden" name="storyID" value="<?php echo $storyID?>" />
    <div class="form-group">
      <label for="storytitle">Story Title:</label>
      <input type="text" class="form-control" id="storytitle" placeholder="Title" name="storytitle" value="<?php echo $storyTitle?>" >
    </div>
    <div class="form-group">
      <label for="storydescription">Description:</label>
      <textarea class="form-control" rows="5" id="storydescription" name="storydescription"><?php echo $storyDescription?>"></textarea>
    </div>
	<div class="form-group">
      <label for="keywords">Story Keywords:</label>
      <input type="text" class="form-control" id="keywords" placeholder="Keywords" name="keywords" value="<?php echo $storyKeywords?>">
    </div>
	<div class="form-group">
      <label for="link">Story link:</label>
      <input type="url" class="form-control" id="link" placeholder="link" name="link" value="<?php echo $storyLink?>">
    </div>
	<div class="form-group">
		<label for="type">Select story type:</label>
			<select class="form-control" id="type" name="type">
				<option value="video" <?php if($storyType=='video') echo 'selected'?>>Video</option>
				<option value="audio" <?php if($storyType=='audio') echo 'selected'?>>Audio</option>
				<option value="written" <?php if($storyType=='written') echo 'selected'?>>Text</option>
			</select>
	</div>
	<button type="submit" class="btn btn-default">Update</button>
 </form>
 
 </div>
 <div class="col-sm-6 well" >
 <h5>Link communities to selected story</h5>
 <form id="linkstorytoarea" action="linkStoryToArea.php" method="post">
 <input type="hidden" name="storyID" value="<?php echo $storyID?>" />
 <div class="form-group">
		<label for="area">Connect this story to community:</label>
			<select class="form-control" id="area" name="area">
				<option value="">-Select area-</option>
				<?php
				$sql="SELECT * FROM community WHERE communityID NOT IN(SELECT communityID FROM storyarea WHERE storyID=$storyID) ORDER BY communityName";
				$result=$conn->query($sql);  //runs the query in database
				while($row=$result->fetch_assoc()){
					echo '<option value="'.$row['communityID'].'">'.$row['communityName'].', '.$row['country'].'</option>';
				}
				?>
			</select>
	</div>
	<button type="submit" class="btn btn-default">Link to story</button>
 </form>
 <p></p>
 <div class="well">
 <h5>Communities linked to this story</h5>
 <ul class="list-group">
 <?php
	$sql="SELECT communityName, country FROM community INNER JOIN storyarea ON community.communityID=storyarea.communityID
			WHERE storyarea.storyID=$storyID ORDER BY country, communityName";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc()){
			echo '<li class="list-group-item">'.$row['communityName'].', '.$row['country'].'</li>';
	}
	$conn->close();
 ?>
 </ul>
 </div>
 </div>
</div>