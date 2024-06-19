<?php
function connect()
{
  $sv = "localhost";
  $us = "root";
  $psw = "";
  $db = "db_comlib";

  $conn = new mysqli($sv, $us, $psw, $db);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}