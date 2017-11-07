<?php
/*
	file:	persons.php
	desc:	Lists all persons in person-table
*/
if(!empty($_POST['keyword'])) $keyword=$_POST['keyword'];else $keyword='';
$keyword.='%%';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Database Example with Personnel db</title>
	</head>
	<body>
		<h3>Personnel</h3>
		<form action="login.php" method="post">
			Email<input type="text" name="email" />
			Password<input type="password" name="password" />
			<input type="submit" value="Login" />
		</form>
	
		<?php
		echo '<table><tr><th>ID#</th><th>CompanyName</th><th>Street</th>';
		echo '<th>PostNr</th><th>City</th><th>Description</th><th>Website</th><th>Facebook</th></tr>';
		include('../db.php'); //use the database connection
		$sql = "SELECT * FROM company";
				echo $sql;
		$result=$conn->query($sql);  //runs the query in database
		while($row=$result->fetch_assoc()){
			echo '<tr>';
			echo '<td>'.$row['companyID'].'</td>';
			echo '<td>'.$row['companyName'].'</td>';
			echo '<td>'.$row['street'].'</td>';
			echo '<td>'.$row['postnr'].'</td>';
			echo '<td>'.$row['city'].'</td>';
			echo '<td>'.$row['description'].'</td>';
			echo '<td>'.$row['website'].'</td>';
			echo '<td>'.$row['facebook'].'</td>';

			echo '</tr>';
		}
		echo '</table>';
		$conn->close();
		?>
	</body>
</html>







