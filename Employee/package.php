

			<!-- PHP code to establish connection with the localserver -->
<?php
$conn=mysqli_connect('localhost','root','','trip_to_nepal') ;
          





// SQL query to select data from database
$sql = " SELECT * FROM  package_tbl";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>package table</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1>managing packages</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
		<tr>
			
		        <th>package id</th>
				<th>post card</th>
               
				<th>Destination</th>
				<th>Title</th>
				<th>price</th>
			    <th>Details</th>
				<th>update</th>
                <th>delete</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
					$packageId=$rows['package_id'];
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['package_id'];?></td>
				<td><?php echo "<img src=\"../package/uploads/$rows[Logo_name]\"  height=\"60%\" width=\"80%\" frameborder='0' alt=\"Unable to see photo\" >"?></td>
				<td><?php echo $rows['destination'];?></td>
				<td><?php echo $rows['title'];?></td>
                <td><?php echo $rows['price'];?></td>
                <td><?php echo $rows['details'];?></td>
				<td><?php

						echo "<a href='http://localhost/tour and travel website/Employee/updatePackage1.php?packageId=$packageId'>UPDATE</a>";
						?>
						</td>
						<td><?php

						echo "<a href='http://localhost/tour and travel website/Employee/deletePackage.php?packageId=$packageId'>DELETE</a>";
						?>
						</td>
			</tr>


			<?php
			
				}
			?>
		</table>
	</section>
</body>

</html>
