<?php
    // Connect to MySQL
    include("connect.php");

    // Prepare the SQL statement
      date_default_timezone_set('Europe/Athens');
     $dateS = date('m/d/Y h:i:s', time());
    echo $dateS;
    $SQL = "INSERT INTO Weather.data (date,temperature,humidity,pressure,eCO2,tVOC) VALUES ('$dateS','".$_GET["t_fahrenheit"]."','".$_GET["t_humidity"]."','".$_GET["t_hectopascals"]."','".$_GET["eCO2"]."','".$_GET["tVOC"]."')";     

    // Execute SQL statement
    mysql_query($SQL);

    // Go to the review_data.php (optional)
    header("Location: index.php");
?>