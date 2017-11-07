
			<?php
			
			if(!empty($_GET['mode'])) $mode=$_GET['mode'];else $mode='';
			//variables used in pager: $start and $nr_of_records defined here
			if(!empty($_GET['start'])) $start=$_GET['start'];else $start=0;
			$nr_of_records=5;  //display 5 records at list on every page
			//checkin, if on the firs page, start is always zero - even in previous
			if($start==0) $prev=$start;else $prev=$start-$nr_of_records;
			include('../db.php'); //use the database connection from parent folder
			//check the number of records from database table person
			$sql="SELECT count(*) as NrOfRecords FROM community";
			$result=$conn->query($sql);
			$row=$result->fetch_assoc();
			$TotalRecords=$row['NrOfRecords'];
			?>
			<h4>Communite</h4>
			<a href="index.php?page=community&mode=add">Add new community</a>

			<?php

	
echo '<table class="table table-bordered"><tr><th>ID#</th><th>CommunityName</th><th>Country</th><th>Description</th>
		<th>Edit</th><th>Delete</th></tr>';

		if($mode=='add'){
			echo '<form action="insertcommunity.php" method="post">
				  <tr>
					<td></td>
					<td><input type="text" name="communityName" /></td>
					<td><input type="text" name="country" /></td>
					<td><input type="text" name="description" /></td>
					</td>
					<td><input type="submit" value="Add" /></td>
				  </tr>
				  </form>';
		}

		

		include('../db.php'); //use the database connection
		$sql = "SELECT * FROM community ORDER BY communityName LIMIT $start,$nr_of_records";
				
		$result=$conn->query($sql);  //runs the query in database
		while($row=$result->fetch_assoc())
		{
			echo '<tr>';
			echo '<td>'.$row['communityID'].'</td>';
			echo '<td>'.$row['communityName'].'</td>';
			echo '<td>'.$row['country'].'</td>';
			echo '<td>'.$row['description'].'</td>';
			echo '<td><a href="editcommunity.php?communityID='.$row['communityID'].'"><span class="glyphicon glyphicon-pencil"></span></a></td>';
			echo '<td><a href="deletecommunity.php?communityID='.$row['communityID'].'"><span class="glyphicon glyphicon-trash"></span></a></td>';

			echo '</tr>';
			
		
		}
		echo '</table>';

		$conn->close();
		?>
<ul class="pager">
<?php
	//check if in the first page
	if($start==0){
		echo '<li>Previous</li>';
	}else{
?>
  <li><a href="index.php?page=community&start=<?php echo $prev?>">Previous</a></li>
<?php
	}
	//check if already in the last page
	$lastrecordnow=$start+$nr_of_records;
	if($lastrecordnow<$TotalRecords){
?>
  <li><a href="index.php?page=community&start=<?php echo $start+$nr_of_records?>">Next</a></li>
<?php
	}else echo '<li>Next</li>';
?>
 </ul>

	






