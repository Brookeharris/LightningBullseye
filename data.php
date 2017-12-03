<?php
//database
$DB_HOST = '47.199.233.120';
$DB_USERNAME = 'team';
$DB_PASSWORD = 'lightning';
$DB_NAME = 'WordpressDB';

//get connection
$mysqli = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT Temperature FROM WeatherData ORDER BY Date desc, Time desc LIMIT 30");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
?>