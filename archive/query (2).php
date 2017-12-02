<?php
    $dbhost = '192.168.1.213';
    $dbuser = 'team';
    $dbpass = 'lightning';
    $connect=mysql_connect("192.168.1.213","team","lightning");

    $db_selected = mysql_select_db("Weather", $connect);

	if (!$db_selected) {
    	die ('Can\'t use Weather database : ' . mysql_error());
	}
	echo 'Connected successfully';

	$query = mysql_query("SELECT * FROM WeatherData2");

    while ($rows = mysql_fetch_array($query)):
		$date = $rows['date'];
		$temperature = $rows['temperature'];
    echo "$date<br>$temperature<br><br>";

	endwhile;
?>