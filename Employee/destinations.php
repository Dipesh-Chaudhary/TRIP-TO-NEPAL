<!-- PHP code to establish connection with the localserver -->
<?php
$conn=mysqli_connect('localhost','root','','trip_to_nepal') ;
          





// SQL query to select data from database
$sql = " SELECT * FROM  categories_tbl";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Destinations table</title>
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
		<h1>managing destinations</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
                <th>image</th>
                <th>destination name</th>
				<th>category</th>
                <th>blogs</th>
				<th>update</th>
                <th>delete</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=mysqli_fetch_array($result))
				{
					
					$Destination= $rows['Destination'];
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo "<img src=\"../categories/uploads/$rows[Front_photo_name]\"  height=\"60%\" width=\"80%\" frameborder='0' alt=\"Unable to see photo\" >;"?></td>
				<td><?php echo $Destination;?></td>
				<td><?php echo $rows['Category_type'];?></td>
				<td><?php echo $rows['Blogs'];?></td>
               
                <td><?php

                    echo "<a href='http://localhost/tour and travel website/Employee/updateDestination1.php?Destination=$Destination'>UPDATE</a>";
                    ?>
                </td>
                <td><?php
                    
                    echo "<a href='http://localhost/tour and travel website/Employee/deleteDestination.php?Destination=$Destination'>DELETE</a>";
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
