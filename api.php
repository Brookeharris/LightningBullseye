<?php 

  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  include 'DB.php';

  $host = "47.199.233.120";
  $user = "root2";
  $pass = "root";

  $databaseName = "Weather";
  $tableName = "WeatherData2";

$result = $mysqli->query("SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL");
$row = $result->fetch_assoc();
echo htmlentities($row['_message']);

  $con = mysqli_connect($host,$user,$pass,$databaseName);

  // Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  // 2) Query database for data
  mysqli_query($con,"SELECT * FROM $tableName");


  if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    printf ("%s (%s)\n",$row[0],$row[1]);
    }
  // Free result set
  mysqli_free_result($result);
}
  //fetch result    
	
  //while($row = mysql_fetch_row($result)){
  //$table_data[]= array("id"=>$row['id'],"name"=>$row['name']);
  //}
  //echo json_encode($table_data);

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($array);

?>