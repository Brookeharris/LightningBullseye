<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Team Lightning - Project Bullseye</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
		    google.charts.load('current', {'packages':['corechart']});
		// Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(line_chart);
      
  function line_chart() 
  {
	  	var jsonData = $.ajax({
			url: 'column_chart.php',
    		dataType:"json",
    		async: false,
			success: function(jsonData)
				{
					var options = 
					{
						legend: 'none',
						hAxis: { minValue: 0, maxValue: 9 },
						curveType: 'function',
						pointSize: 7,
						dataOpacity: 0.3
					};
					var data = new google.visualization.arrayToDataTable(jsonData);	
        			 var chart = new google.visualization.LineChart(document.getElementById('line_chart'));
                     chart.draw(data, options);
					
				}	
			}).responseText;
	  
    }
	
    </script>

	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">
				<!-- Intro -->
					<div id="intro">
						<h1>Team<br />
						Lightning</h1>
						<p>Project: Bullseye Weather Station</p>
				</div>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="location.html">Location</a></li>
							<li><a href="documentation.html">Documentation</a></li>
							<li><a href="old-data.php">Archive</a></li>
							<li><a href="bug.html">Report a Bug</a></li>
						</ul>
						<ul class="icons">
							<li><a href="https://github.com/Brookeharris/LightningBullseye" class="icon fa-github" target="_blank"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Featured Post -->
							<article class="post featured">
								<header class="major">
									<h2>Weather Station<br />
									Bullseye</h2>
									<p>The Bullseye Weather Station provides data of weather in the zip code of 33617. The data included is temperature, pressure in MB, the humidity in %, and air quality.</p>
								</header>
								<ul class="actions">
									<li><a href="documentation.html" class="button big">Documentation</a></li>
								</ul>
							</article>

						<!-- Graphs -->
								<article>
									<header>
										<h2>Temperature</h2>
									</header>
									
									<?php
									$con=mysqli_connect("47.199.233.120","team","lightning","WordpressDB");
									
									if (mysqli_connect_errno())
  									{
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
									}
		
									$sql="SELECT * FROM WeatherData ORDER BY Date desc, Time desc LIMIT 5";
									
									$result=mysqli_query($con,$sql);
								
									echo "<table border='3'>
									<tr>
										<th>Date (MM/DD/YY)</th>
										<th>Time (HH:MM)</th>
										<th>Temperature (Fahrenheit)</th>
									</tr>";
									
						while(($row=mysqli_fetch_array($result,MYSQLI_ASSOC)))
						{	
							echo "<tr>";
								echo "<td>" . $row['Date'] . "</td>";
								echo "<td>" . $row['Time'] . "</td>";
								echo "<td>" . $row['Temperature'] . "</td>";
							echo "</tr>";
						}
						echo "</table>";?>


    <!--Div that will hold the pie chart-->
	<div style="font: 21px arial; padding: 10px 0 0 100px;">Pie Chart</div>
   <div id="piechart_div"></div>
   <div style="font: 21px arial; padding: 10px 0 0 100px;">Column Chart</div>
	<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
	<div style="font: 21px arial; padding: 10px 0 0 100px;">Bar Chart</div>
	<div id="bar_chart" style="width: 900px; height: 300px;"></div>
	<div style="font: 21px arial; padding: 10px 0 0 100px;">Line Chart</div>
	<div id="line_chart" style="width: 900px; height: 300px;"></div>
 									
			
							<center><h4>Past five temperature readings</h4></center>
								
				<!-- Copyright -->
					<div id="copyright">
						<strong><ul><li>Thomas Renz, Brooke Harris, and Kevin Ly </li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul></strong>
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