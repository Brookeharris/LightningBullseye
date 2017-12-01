<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Archive of All Data</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">Bullseye Weather Station</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="index.php">Home</a></li>
							<li><a href="location.html">Location</a></li>
							<li><a href="documentation.html">Documentation</a></li>
							<li class="active"><a href="old-data.php">Archive</a></li>
							<li><a href="bug.html">Bug Reports</a></li>
						</ul>
						<ul class="icons">
							<li><a href="https://github.com/Brookeharris/LightningBullseye" class="icon fa-github" target="_blank"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
					<h2>Archived Weather Data</h2>
						<!-- Post -->
						<section class="post">
							<p>This is an archive of all the data that the Bullseye Weather Station has collected to date, listed from oldest to newest.</p>
						<?php
						$con=mysqli_connect("47.199.233.120","team","lightning","Weather");
							
						if (mysqli_connect_errno())
  						{
  							echo "Failed to connect to MySQL: " . mysqli_connect_error();
  						}
		
						$sql="SELECT * FROM WeatherData2";
						$result=mysqli_query($con,$sql);

						echo "<table border='1'>
						<tr>
							<th>Date (MM/DD/YYYY)</th>
							<th>Time (HH:MM:SS)</th>
				<th>Temperature (Fahrenheit)</th>
				<th>Humidity (%)</th>
				<th>Pressure (MB)</th>
				<th>eCO2 (PPM)</th>
			</tr>";
					
			while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				echo "<tr>";
				echo "<td>" . $row['Date'] . "</td>";
				echo "<td>" . $row['Time'] . "</td>";
				echo "<td>" . $row['Temperature'] . "</td>";
				echo "<td>" . $row['Humidity'] . "</td>";
				echo "<td>" . $row['Pressure'] . "</td>";
				echo "<td>" . $row['eCO2'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
	
	mysqli_free_result($result);
	mysqli_close($con);
?>
							</section>
					</div>

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>Thomas Renz, Brooke Harris, and Kevin Ly </li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
					</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>