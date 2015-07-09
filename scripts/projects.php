<?php
require("connect.php");
$name = $_GET['name'];

	 //Puts SQL Data into an array
		 $data = mysqli_query($con,"SELECT * FROM projects where clientName ='" . $name . "'");
			
			echo "<table border='1'><th>Project ID</th><th>Project Name</th><th>Client Name</th><th>Workflow</th><th>Handover Sheet</th>";
			while($row = mysqli_fetch_array( $data ))
			{
				echo "<tr><td>".$row['projectId']."</td><td>".$row['projectName']."</td><td>".$row['clientName']."</td><td><a href='scripts/".$row['workflow']."'>$row[projectName].pdf</a></td><td><a href='scripts/".$row['sheet']."'>$row[projectName].xlsx<a/></td></tr>";
			}
			echo "</table>";
		 
		 ?>