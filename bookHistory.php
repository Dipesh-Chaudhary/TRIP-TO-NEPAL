<!-- PHP code to establish connection with the localserver -->
<?php

$mysqli = new mysqli('localhost','root','','trip_to_nepal');

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM booking_tbl ORDER BY booking_id asc";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Booking Details</title>
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
		<h1>MANAGE BOOKING</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>

                <th>package id</th>

                <th>message</th>
                <th>checkin date</th>
				<th>STATUS</th>

			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
					$bookingId=$rows['booking_id'];
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				
				<td><?php echo $rows['packageId'];?></td>
			
                <td><?php echo $rows['message'];?></td>
                <td><?php echo $rows['checkin'];?></td>
				<td><?php echo $rows['status'];?></td>


			</tr>
			<?php
				}
			?>
		</table>
	</section>
    <a style="align:center"href="http://localhost/tour and travel website/index.html">GO TO HOMEPAGE</a>
</body>

</html>
