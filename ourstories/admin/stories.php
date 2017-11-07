<?php
/*
	file:	ourstories_example/admin/stories.php
	desc:	List stories
*/
?>
<h4>Stories</h4>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th><th>Storytype</th><th>Title</th><th>About</th><th>Keywords</th><th>Link</th>
		</tr>
	</thead>
	<tbody>
	<?php
		include('../db.php');
		$sql="SELECT * FROM story ORDER BY storyType,storyTitle";
		$result=$conn->query($sql);  //runs the query in database
		while($row=$result->fetch_assoc()){
			echo '<tr>';
			echo '<td>'.$row['storyID'].'</td>';
			echo '<td>'.$row['storyType'].'</td>';
			echo '<td>'.$row['storyTitle'].'</td>';
			echo '<td>'.$row['storyDescription'].'</td>';
			echo '<td>'.$row['storyKeywords'].'</td>';
			echo '<td><a href="'.$row['storyLink'].'" target="_new">'.$row['storyLink'].'</a></td>';
			echo '<td><a href="index.php?page=editStory&storyID='.$row['storyID'].'"><span class="glyphicon glyphicon-pencil"></span></a></td>';
			echo '</tr>';
		}
		$conn->close();
	?>
	</tbody>
</table>