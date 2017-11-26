<?php
$MyUsername = "root2";  // enter your username for mysql
$MyPassword = "root";  // enter your password for mysql
$MyHostname = "47.199.233.120";      // this is usually "localhost" unless your database resides on a different server

$dbh = mysql_pconnect($MyHostname , $MyUsername, $MyPassword);
$selected = mysql_select_db("Weather",$dbh); //Enter your database name here 
?>