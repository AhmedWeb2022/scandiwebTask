<?php

class Dbh
{

  public function connect()
  {

    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "scandiwebTask";
    // $dbh = new PDO('mysql:host=localhost;dbname=scandiwebTask', $username, $password);
    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
    return $conn;
  }
}
