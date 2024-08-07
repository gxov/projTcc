<?php
function connect()
{
  $server = "localhost";
  $username = "root";
  $password = "";
  $bd = "db_comlib";

  $conn = new mysqli($server, $username, $password, $bd);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}