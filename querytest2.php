<html>
<head>
<title>Test PHP Connection Script</title>
</head>
<body>

<h3>Welcome to the PHP Connect Test</h3>

<?php
$dbname = 'Weather';
$dbuser = 'team';
$dbpass = 'lightning';
$dbhost = '192.168.1.213';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'");
mysqli_select_db($dbname) or die("Could not open the database '$dbname'");
$result = mysqli_query("SELECT * FROM WeatherData2");
while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
    printf("ID: %s  Temp: %s <br>", $row[0], $row[1]);
}
?>

</body>
</html>