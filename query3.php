<?php
$con=mysqli_connect("47.199.233.120","team","lightning","Weather");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM WeatherData2";
$result=mysqli_query($con,$sql);

// Numeric array
//$row=mysqli_fetch_array($result,MYSQLI_NUM);
//printf ("%s (%s)\n",$row[1],$row[2], $row[3], $row[4], $row[5], $row[6]);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	printf ("%s %s %s %s %s %s\n", $row["Date"], $row["Time"], $row["Temperature"], $row["Humidity"], $row["Pressure"], $row["eCO2"]);
}

mysqli_free_result($result);
mysqli_close($con);


//<table>
//    <thead>
//        <tr>
//            <th>"Date"</th>
//            <th>"Time"</th>
//            <th>"Temperature"</th>
//        </tr>
//    </thead>
//    <tbody>

?>