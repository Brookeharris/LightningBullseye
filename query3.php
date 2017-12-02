<?php
$con=mysqli_connect("47.199.233.120","team","lightning","WordpressDB");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM WeatherData";
$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	printf ("%s %s %s %s %s %s\n", $row["Date"], $row["Time"], $row["Temperature"], $row["Humidity"], $row["Pressure"], $row["eCO2"]);
}

mysqli_free_result($result);
mysqli_close($con);

?>